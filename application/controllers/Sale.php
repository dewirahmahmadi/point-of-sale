<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model(['customer_m', 'sale_m', 'item_m']);
	}

	/**
	 * Display Sale Transaction
	 */
	public function index(){
		$data = [
			'customers' =>$this->customer_m->get()->result(),
			'invoice' => $this->sale_m->generate_invoice(),
			'items' => $this->item_m->get()->result()
		];
		$this->template->load('template', 'transaction/sales/sale_form', $data);
	}

	/**
	 * Create Transaction
	 */
	public function process(){
        $post = $this->input->post(null, true);
        if (isset($_POST['process_payment'])) {
            $sale = $this->sale_m->add_sale($post);

			foreach ($post['products'] as $product) {
				$this->sale_m->add_sale_detail($product, $sale);
				$this->item_m->update_stock_out($product);
			}
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "total" => $post['cash'], "remain" => $post['change'], "url" => site_url('sale/print_invoice/'.$sale));
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

	/**
	 * Print Invoice
	 * @param $id
	 */
	public function print_invoice($id){
		$data['sale'] = $this->sale_m->get_sale($id)->row();
		$data['sale_detail'] = $this->sale_m->get_sale_detail($id)->result();
		$this->load->view('transaction/sales/print_invoice', $data);
	}

}

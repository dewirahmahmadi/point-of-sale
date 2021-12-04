<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model(['customer_m', 'sale_m', 'item_m']);
	}

	public function index(){
		$data = [
			'customers' =>$this->customer_m->get()->result(),
			'invoice' => $this->sale_m->generate_invoice(),
			'items' => $this->item_m->get()->result()
		];
		$this->template->load('template', 'transaction/sales/sale_form2', $data);
	}

	public function process(){
        $post = $this->input->post(null, true);
        if (isset($_POST['process_payment'])) {
            $sale = $this->sale_m->add_sale($post);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "data" => $sale);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function cetak($id){
        $data['sale'] = $this->sale_m->get_sale($id)->row();
        // $data['sale_detail'] = $this->sale_m->get_sale_detail($id)->result();
        $this->load->view('transaction/sales/print_invoice', $data);
    }

}

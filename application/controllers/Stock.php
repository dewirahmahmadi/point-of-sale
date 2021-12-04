<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'supplier_m', 'stock_m']);
    }

    public function stock_in_data() 
    {
        $data['stocks'] = $this->stock_m->get_stock_in()->result();
		$data['page'] = "delete_in";
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);

    }

	public function stock_out_data()
	{
		$data['stocks'] = $this->stock_m->get_stock_out()->result();
		$data['page'] = "delete_out";
		$this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
	}

    public function stock_in_add() 
    {
        $items = $this->item_m->get()->result();
        $suppliers = $this->supplier_m->get()->result();
        $data = [
			'page' => 'in_add',
			'items' => $items,
			'suppliers' => $suppliers];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

	public function stock_out_add()
	{
		$items = $this->item_m->get()->result();
		$data = [
			'page' => 'out_add',
			'items' => $items];
		$this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
	}

	public function stock_in_edit($id)
	{
		$items = $this->item_m->get()->result();
		$suppliers = $this->supplier_m->get()->result();
		$data = [
			'page' => 'in_edit',
			'items' => $items,
			'suppliers' => $suppliers];
		$this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
	}

	public function delete()
	{
		$stock_id = $this->input->post('stock_id');
		$item_id = $this->input->post('item_id');
		$qty = $this->stock_m->get_stock($stock_id)->row()->qty;
		$data = [
			'qty' => $qty,
			'item_id' => $item_id
		];

		if (isset($_POST['delete_in'])) {
			$this->item_m->update_stock_out($data);
		}

		if (isset($_POST['delete_out'])) {
			$this->item_m->update_stock_in($data);
		}

		$this->stock_m->delete($stock_id);

		if ($this->db->affected_rows() > 0) {
			if (isset($_POST['delete_in'])) {
				$this->session->set_flashdata('success', 'Stock in succesfully deleted!');
				redirect('stock/in');
			}

			if (isset($_POST['delete_out'])) {
				$this->session->set_flashdata('success', 'Stock out succesfully deleted!');
				redirect('stock/out');
			}
		}
	}

    public function process() 
    {
		$post = $this->input->post(null, TRUE);
        if (isset($_POST['in_add'])) {
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Data Stock In Successfully saved!");
            }
            redirect('stock/in');
        }

		if (isset($_POST['out_add'])) {
			$this->stock_m->add_stock_out($post);
			$this->item_m->update_stock_out($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', "Data Stock Out Successfully saved!");
			}
			redirect('stock/out');
		}
	}


}

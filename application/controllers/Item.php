<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'category_m', 'unit_m']);
    }

	/**
	 * Display Item Listing
	 */
	public function index(){
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	/**
	 * Display Add Form Item
	 */
	public function add(){
		$item = new stdClass();
		$item->item_id = null;
		$item->name = null;
        $item->price = null;
        $item->category_id = null;
        $item->unit_id = null;
		$item->image = null;

        $category = $this->category_m->get();
        $unit = $this->unit_m->get();
		$data = array(
			'page' => 'add',
			'row' => $item,
            'category' => $category,
            'unit' => $unit
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}

	/**
	 * Display Edit Form Item
	 */
	public function edit($id){
		$query = $this->item_m->get($id);
		if ($query->num_rows() > 0) {
			$item = $query->row();
            $category = $this->category_m->get();
            $unit = $this->unit_m->get();
			$data = array(
				'page' => 'edit',
				'row' => $item,
                'category' => $category,
                'unit' => $unit
			);
			$this->template->load('template', 'product/item/item_form', $data);
		} else {
            $this->template->load('template', 'not_found');
        }
	}

	public function process(){
		$config['upload_path'] = "./uploads/products";
		$config['allowed_types'] = "jpeg|jpg|png";
		$config['max_size'] = 2048;
		$config['file_name'] = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
				if (@$_FILES['image']['name'] != null) {
					if (!$this->upload->do_upload('image')){
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('item/add');
					} 
					$post['image'] = $this->upload->data('file_name');
				} else {
					$post['image'] = null;
				}
				$this->item_m->add($post);
		} else if(isset($_POST['edit'])){
				if (@$_FILES['image']['name'] != null) {
					if (!$this->upload->do_upload('image')){
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('item/edit'.$post['id']);
					}
					$post['image'] = $this->upload->data('file_name');
				} else {
					$post['image'] = null;
				}
                $this->item_m->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data successfully saved!");
			redirect('item');
		}
	}

	/**
	 * Controller to delete item
	 */
	public function delete($id){
		$this->item_m->delete($id);
		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data successfully deleted!");
			redirect('item');
		}
	}


}

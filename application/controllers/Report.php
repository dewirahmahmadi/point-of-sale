<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('sale_m');
		check_not_login();
	}

	public function sale_report(){
		$data['sales'] = $this->sale_m->get_sale()->result();
		$this->template->load('template', 'reports/sale_report', $data);
	}

	public function print_report($sale_id){
		if (isset($sale_id)) {
			$data['report'] = $this->sale_m->get_sale_detail($sale_id)->result();
			$html = $this->load->view('reports/print_data_sale', $data, true);
			$this->fungsi->PdfGenerator($html, 'Laporan', 'A4', 'landscape');
		} else {
			$this->template->load('template', 'not_found');
		}
	}

	public function details($sale_id) {
		if ($sale_id) {
			$data['report'] = $this->sale_m->get_sale_detail($sale_id)->result();
			$this->template->load('template', 'reports/details', $data);
		} else {
			$this->template->load('template', 'not_found');
		}
	}

	public function print_invoice($sale_id){
		if (isset($sale_id)) {
			$data['report'] = $this->sale_m->get_sale_detail($sale_id)->result();
			$this->load->view('reports/print_data_sale', $data);
		} else {
			$this->template->load('template', 'not_found');
		}
	}
}

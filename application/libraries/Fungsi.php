<?php

Class Fungsi {
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function user_login() {
        $this->ci->load->model('user_m');
        $userid = $this->ci->session->userdata('userid');
        $user_data= $this->ci->user_m->get($userid)->row();
        return $user_data;
    }

    public function count_items() {
        $this->ci->load->model('item_m');
        return $this->ci->item_m->get()->num_rows();
    } 

    public function count_supplier() {
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    } 

    public function count_custumer() {
        $this->ci->load->model('customer_m');
        return $this->ci->customer_m->get()->num_rows();
    } 

    public function count_users() {
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }

	function PdfGenerator($html, $filename, $papper, $orientation){
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper($papper, $orientation);

		// Render the HTML as PDF
		$dompdf->render();

//		ob_end_clean();
		// Output the generated PDF to Browser
		$dompdf->stream($filename, ['Attachment' => 0]);
	}

}

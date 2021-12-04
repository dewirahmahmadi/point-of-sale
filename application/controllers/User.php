<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }

    /**
     * Display List of User
     */
	public function index(){
        $data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

    public function add() {
		$user = new stdClass();
		$user->username = null;
		$user->name = null;
        $user->address = null;
        $user->lever = null;
		$data = array(
			'page' => 'add',
			'row' => $user
		);
        $this->template->load('template', 'user/user_form', $data);
	}

	public function edit($id) {   
		$query = $this->user_m->get($id);
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $user
			);
            $this->template->load('template', 'user/user_form', $data);
		} else {
            $this->template->load('template', 'not_found');
        }
	}

	public function process() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', 
            array('matches' => '%s your password not matches')
        );
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE){
            return $this->template->load('template', 'user/user_form');
        }

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->user_m->add($post);
		} else if(isset($_POST['edit'])){
			$this->user_m->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data successfully saved!");
			redirect('user');
		}
	}

    public function delete($id){
        $this->user_m->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data successfully deleted!");
            redirect('user');
        }
    }
}

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
			'row' => $user
		);
        $this->template->load('template', 'user/user_form_add', $data);
	}

	public function edit($id) {   
		$query = $this->user_m->get($id);
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$data = array(
				'row' => $user
			);
            $this->template->load('template', 'user/user_form_edit', $data);
		} else {
            $this->template->load('template', 'not_found');
        }
	}

    public function save() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]', 
            array('matches' => '%s your password not matches')
        );
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE){
                $user = new stdClass();
		        $user->username = set_value('username');
		        $user->name = set_value('fullname');
                $user->address = set_value('address');
                $user->level = set_value('level');
                $data = array(
                    'row' => $user
                );
            return $this->template->load('template', 'user/user_form_add', $data);
        }

        $post = $this->input->post(null, TRUE);
        $this->user_m->add($post);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data successfully saved!");
			redirect('user');
		}
    }

    public function update() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
                array('matches' => '%s your password not matches')
            );
        }

		if ($this->input->post('passconf')){
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
				array('matches' => '%s your password not matches')
			);
		}

        $this->form_validation->set_rules('level', 'Level', 'required');

		$post = $this->input->post(null, TRUE);
		if ($this->form_validation->run() == FALSE){
			$query = $this->user_m->get($post['user_id']);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				return $this->template->load('template', 'user/user_form_edit', $data);
			} else {
				return $this->template->load('template', 'not_found');
			}
		}

		$this->user_m->edit($post);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', "Data successfully saved!");
			redirect('user');
		}
    }

	public function username_check() {
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if ($query->num_rows() > 0){
			$this->form_validation->set_message('username_check', '{field} already exists.');
			return FALSE;
		} else {
			return TRUE;
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

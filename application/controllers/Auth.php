<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Display Login
	 */
	public function login(){
        check_already_login();
		$this->load->view('login');
	}

	/**
	 * Used to sign in
	 */
    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if($query->num_rows() > 0){
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                redirect('dashboard');
            } else {
                redirect('auth/login');
            }
        }
    }

	/**
	 * Used to logout
	 */
    public function logout(){
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	function signout()
	{
		$this->session->sess_destroy();
		redirect('signin','refresh');
	}

	function signin()
	{
		if ($this->input->post('submit')) {
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			if ($user == 'adminsikiper' && $pass == 'bismillah') {
				$userdata = array(
					'user' => 'adminsikiper',
					'is_logged_in' => TRUE,
				);
				$this->session->set_userdata($userdata);
				redirect('','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Username/Password Salah');
			}
		}
		$this->load->view('template/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
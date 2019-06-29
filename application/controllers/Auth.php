<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AnggotaModel');
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
			$get_credential = $this->AnggotaModel->get_login($user,md5($pass));
			if ($get_credential->num_rows() > 0) {
				$fetch_userdata = $get_credential->row();
				$userdata = array(
					'id' => $fetch_userdata->id_anggota,
					'nama_anggota' => $fetch_userdata->nama_anggota,
					'user' => $fetch_userdata->nik_anggota,
					'level' => $fetch_userdata->role,
					'is_logged_in' => TRUE,
				);
				$this->session->set_userdata($userdata);
				redirect('','refresh');
			}else{
				$this->session->set_flashdata('msg', 'NIK/Password Salah');
			}
		}
		$this->load->view('template/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
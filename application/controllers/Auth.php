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
		redirect('signin','refresh');
	}

	function signin()
	{
		$this->load->view('template/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('Page');
	}

	public function index()
	{
		$this->page->view('home');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
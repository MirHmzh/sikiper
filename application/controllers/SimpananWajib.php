<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananWajib extends Authenticated_Controller {

	function __construct($foo = null)
	{
		parent::__construct();
		$this->load->library('Page');
		$this->load->model('SimpananWajibModel');
	}

	function index()
	{
		$data['data'] = $this->SimpananWajibModel->get();
		$this->page->view('simpanan_wajib/index', $data);
	}

}
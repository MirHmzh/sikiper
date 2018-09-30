<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function view($view, $data = [])
	{
		$this->ci->load->view('template/head');
		$this->ci->load->view($view, $data);
		$this->ci->load->view('template/foot');
	}



}

/* End of file Page.php */
/* Location: ./application/libraries/Page.php */

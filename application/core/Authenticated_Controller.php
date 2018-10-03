<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticated_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			$this->session->set_flashdata('msg', 'Anda harus masuk terlebih dahulu');
			redirect('signin','refresh');
		}
	}

}

/* End of file Authenticated_Controller.php */
/* Location: ./application/core/Authenticated_Controller.php */
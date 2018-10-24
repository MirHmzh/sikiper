<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananWajibModel extends CI_Model {

	function get()
	{
		$data = $this->db->get('simpanan_wajib');
		return $data->result();
	}

}
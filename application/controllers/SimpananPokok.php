<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananPokok extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('Page');
		$this->load->model('SimpananPokokModel');
	}

	function index()
	{
		$data['data'] = $this->SimpananPokokModel->get();
		$this->page->view('simpanan_pokok/index', $data);
	}

	function form($id = 0)
	{
		if ($this->input->post('submit')) {
			$simp_pokok['id_anggota'] = $this->input->post('anggota');
			$simp_pokok['nominal_pokok'] = $this->input->post('nominal');
			$simp_pokok['tanggal_disetorkan'] = $this->input->post('tanggal_disetorkan');
			if ($id) {
				$trans = $this->SimpananPokokModel
				->update($id, $simp_pokok);
				$msg = 'Simpanan Pokok telah diubah';
			}else{
				$trans = $this->SimpananPokokModel->insert($simp_pokok);
				$msg = 'Simpanan Pokok telah ditambahkan';
			}

			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', $msg);
				redirect('simpananpokok','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Simpanan Pokok gagal disimpan');
			}
		}

		if ($id == 0) {
			$data['data'] = [];
		}else{
			$data['data'] = $this->SimpananPokokModel->find($id);
		}
		$this->load->model('AnggotaModel');
		$data['anggota'] = $this->AnggotaModel->get();
		$this->page->view('simpanan_pokok/form', $data);

	}

	function del($id)
	{
		$trans = $this->SimpananPokokModel->del($id);
		$this->session->set_flashdata('msg', 'Simpanan Wajib telah dihapus');
		redirect('simpananpokok','refresh');
	}

}

/* End of file SimpananPokok.php */
/* Location: ./application/controllers/SimpananPokok.php */
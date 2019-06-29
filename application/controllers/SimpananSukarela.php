<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananSukarela extends CI_Controller {

	function __construct($foo = null)
	{
		parent::__construct();
		$this->load->library('Page');
		$this->load->model('SimpananSukarelaModel');
	}

	function index()
	{
		$data['data'] = $this->SimpananSukarelaModel->get();
		$this->page->view('simpanan_sukarela/index', $data);
	}

	function form($id = 0)
	{
		if ($this->input->post('submit')) {
			$simpnsukarela['id_anggota'] = $this->input->post('anggota');
			$simpnsukarela['nominal_simp_sukarela'] = $this->input->post('nominal');
			$simpnsukarela['tanggal_disetorkan'] = $this->input->post('tanggal_disetorkan');
			if ($id) {
				$trans = $this->SimpananSukarelaModel->update($id, $simpnsukarela);
				$msg = 'Simpanan Sukarela telah diubah';
			}else{
				$trans = $this->SimpananSukarelaModel->insert($simpnsukarela);
				$msg = 'Simpanan Sukarela telah ditambahkan';
			}

			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', $msg);
				redirect('simpanansukarela','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Simpanan Sukarela gagal disimpan');
			}
		}

		if ($this->input->post('confirm')) {
			$trans = $this->SimpananSukarelaModel->acc($id);
			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', 'Simpanan Sukarela disetujui');
				redirect('simpanan_sukarela','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Simpanan Sukarela gagal disetujui');
				redirect('simpanan_sukarela/form','refresh');
			}
		}

		if ($id == 0) {
			$data['data'] = [];
		}else{
			$data['data'] = $this->SimpananSukarelaModel->find($id);
		}
		$this->load->model('AnggotaModel');
		$data['anggota'] = $this->AnggotaModel->get();
		$this->page->view('simpanan_sukarela/form', $data);
	}

	function del($id)
	{
		$trans = $this->SimpananSukarelaModel->del($id);
		$this->session->set_flashdata('msg', 'Simpanan Sukarela telah dihapus');
		redirect('simpanansukarela', 'refresh');
	}

}

/* End of file SimpananSukarela.php */
/* Location: ./application/controllers/SimpananSukarela.php */
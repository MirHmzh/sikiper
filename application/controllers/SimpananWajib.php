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

	function form($id = 0)
	{
		if ($this->input->post('submit')) {
			$simp_wajib['id_anggota'] = $this->input->post('anggota');
			$simp_wajib['nominal_simp_wajib'] = $this->input->post('nominal');
			$simp_wajib['tanggal_disetorkan'] = $this->input->post('tanggal_disetorkan');
			if ($id) {
				$trans = $this->SimpananWajibModel->update($id, $simp_wajib);
				$msg = 'Simpanan Wajib telah diubah';
			}else{
				$trans = $this->SimpananWajibModel->insert($simp_wajib);
				$msg = 'Simpanan Wajib telah ditambahkan';
			}

			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', $msg);
				redirect('simpananwajib','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Simpanan Wajib gagal disimpan');
			}
		}

		if ($this->input->post('confirm')) {
			$trans = $this->SimpananWajibModel->acc($id);
			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', 'Simpanan Wajib disetujui');
				redirect('simpanan_wajib','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Simpanan Wajib gagal disetujui');
				redirect('simpanan_wajib/form','refresh');
			}
		}

		if ($id == 0) {
			$data['data'] = [];
		}else{
			$data['data'] = $this->SimpananWajibModel->find($id);
		}
		$this->load->model('AnggotaModel');
		$data['anggota'] = $this->AnggotaModel->get();
		$this->page->view('simpanan_wajib/form', $data);
	}

	function del($id)
	{
		$trans = $this->SimpananWajibModel->del($id);
		$this->session->set_flashdata('msg', 'Simpanan Wajib telah dihapus');
		redirect('simpananwajib', 'refresh');
	}

}
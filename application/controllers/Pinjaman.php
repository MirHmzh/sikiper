<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('PinjamanModel');
		$this->load->model('AnggotaModel');
		$this->load->library('Page');
	}

	function index()
	{
		$data['data'] = $this->PinjamanModel->get();
		$this->page->view('pinjaman/index', $data);
	}

	function form($id = 0)
	{
		if ($this->input->post('submit')) {
			$pinjaman['id_anggota'] = $this->input->post('anggota');
			$pinjaman['nominal_pinjaman'] = $this->input->post('nominal');
			$pinjaman['tenor_pinjaman'] = $this->input->post('tenor');
			$pinjaman['jatuh_tempo_pembayaran'] = $this->input->post('jatuh_tempo');

			if ($id == 0) {
				$trans = $this->PinjamanModel->insert($pinjaman);
				$msg = 'Pinjaman telah ditambahkan';
			}else{
				$trans = $this->PinjamanModel->update($id, $pinjaman);
				$msg = 'Pinjaman telah diubah';
			}

			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', $msg);
				redirect('pinjaman','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Pinjaman gagal ditambahkan');
			}
		}

		if ($this->input->post('confirm')) {
			$trans = $this->PinjamanModel->acc($id);
			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', 'Pinjaman disetujui');
				redirect('pinjaman','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Pinjaman gagal disetujui');
				redirect('pinjaman/form','refresh');
			}
		}

		if ($id == 0) {
			$data['data'] = [];
		}else{
			$data['data'] = $this->PinjamanModel->find($id);
		}
		$data['anggota'] = $this->AnggotaModel->get();
		$this->page->view('pinjaman/form', $data);
	}

	function del($id)
	{
		$this->PinjamanModel->del($id);
		$this->session->set_flashdata('msg', 'Pinjaman telah dihapus');
		redirect('pinjaman','refresh');
	}



}

/* End of file Pinjaman.php */
/* Location: ./application/controllers/Pinjaman.php */
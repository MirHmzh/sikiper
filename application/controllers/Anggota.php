<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends Authenticated_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Page');
		$this->load->model('AnggotaModel');
	}

	public function index()
	{
		$data['data'] = $this->AnggotaModel->get();
		// $data['data'] = [];
		$this->page->view('anggota/index', $data);
	}

	public function form($id = 0)
	{
		if ($this->input->post('submit')) {
			$anggota['nik_anggota'] = $this->input->post('nik');
			$anggota['nama_anggota'] = $this->input->post('nama');
			if ($id) {
				$trans = $this->AnggotaModel->update($id, $anggota);
				$msg = 'Anggota telah diubah';
			}else{
				$trans = $this->AnggotaModel->insert($anggota);
				$msg = 'Anggota telah ditambahkan';
			}

			if ($trans == TRUE){
				$this->session->set_flashdata('msg', $msg);
				redirect('anggota','refresh');
			}
			else{
				$this->session->set_flashdata('msg', 'Anggota gagal ditambah');
				redirect('','refresh');
			}
		}

		if ($id == 0) {
			$data['data'] = [];
		}else{
			$data['data'] = $this->AnggotaModel->find($id);
		}
		$this->page->view('anggota/form', $data);
	}

	public function del($id)
	{
		$trans = $this->AnggotaModel->del($id);
		$this->session->set_flashdata('msg', 'Anggota telah dihapus');
		redirect('anggota','refresh');
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
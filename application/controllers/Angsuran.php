<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AngsuranModel');
		$this->load->library('Page');
	}

	function index()
	{
		$data['data'] =  $this->AngsuranModel->get();
		$this->page->view('angsuran/index', $data);
	}

	function form($id = 0)
	{
		if ($this->input->post('submit')) {
			$angsuran['id_pinjaman'] = $this->input->post('id_pinjaman');
			$angsuran['nominal_angsuran'] = $this->input->post('nominal_angsuran');
			$angsuran['angsuran_ke'] = $this->input->post('angsuran_ke');
			if ($id != 0) {
				$trans = $this->AngsuranModel->insert($angsuran);
				$msg = 'Angsuran telah ditambahkan';
			}else{
				$trans = $this->AngsuranModel->update($id, $angsuran);
				$msg = 'Angsuran telah diubah';
			}

			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', $msg);
				redirect('angsuran','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Angsuran gagal ditambahkan');
				redirect('angsuran/form','refresh');
			}
		}

		if ($this->input->post('confirm')) {
			$trans = $this->AngsuranModel->acc($id);
			if ($trans == TRUE) {
				$this->session->set_flashdata('msg', 'Angsuran disetujui');
				redirect('angsuran','refresh');
			}else{
				$this->session->set_flashdata('msg', 'Angsuran gagal disetujui');
				redirect('angsuran/form','refresh');
			}
		}

		if ($id == 0) {
			$data['data'] = [];
		}else{
			$data['data'] = $this->AngsuranModel->find($id);
		}
		$this->page->view('angsuran/form', $data);
	}

	function del($id)
	{
		$trans = $this->AngsuranModel->del($id);
		$this->session->set_flashdata('msg', 'Angsuran telah dihapus');
		redirect('angsuran','refresh');
	}


}

/* End of file Angsuran.php */
/* Location: ./application/controllers/Angsuran.php */
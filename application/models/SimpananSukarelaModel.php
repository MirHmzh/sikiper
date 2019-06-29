<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananSukarelaModel extends CI_Model {

	function get()
	{
		$this->db->select("simpanan_sukarela.*, anggota.nama_anggota, DATE_FORMAT(tanggal_disetorkan, '%d-%m-%Y') AS tgl_disetorkan");
		$this->db->join('anggota', 'simpanan_sukarela.id_anggota = anggota.id_anggota', 'left');
		if ($this->session->userdata('level') != 1) {
			$this->db->where('simpanan_sukarela.id_anggota', $this->session->userdata('id'));
		}
		$data = $this->db->get('simpanan_sukarela');
		return $data->result();
	}

	function find($id)
	{
		$this->db->select("simpanan_sukarela.*, anggota.nama_anggota, DATE_FORMAT(tanggal_disetorkan, '%Y-%m-%d') AS tgl_disetorkan");
		$this->db->join('anggota', 'simpanan_sukarela.id_anggota = anggota.id_anggota', 'left');
		$data = $this->db->get_where('simpanan_sukarela', ['id_simp_sukarela' => $id]);
		return $data->row();
	}

	function insert($data)
	{
		$data = $this->db->insert('simpanan_sukarela', $data);
		return $data;
	}

	function update($id, $data)
	{
		$data = $this->db->update('simpanan_sukarela', $data, ['id_simp_sukarela' => $id]);
		return $data;
	}

	function del($id)
	{
		$data = $this->db->delete('simpanan_sukarela', ['id_simp_sukarela' => $id]);
		return $data;
	}

	function acc($id)
	{
		$trans = $this->db->update('simpanan_sukarela', ['status_sukarela' => 1]);
		return $trans;
	}

}

/* End of file SimpananSukarelaModel.php */
/* Location: ./application/models/SimpananSukarelaModel.php */
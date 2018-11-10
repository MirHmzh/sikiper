<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananPokokModel extends CI_Model {

	function get()
	{
		$this->db->select("simpanan_pokok.*, anggota.nama_anggota, DATE_FORMAT(tanggal_disetorkan, '%d-%m-%Y') AS tgl_disetorkan");
		$this->db->join('anggota', 'simpanan_pokok.id_anggota = anggota.id_anggota', 'left');
		$data = $this->db->get('simpanan_pokok');
		return $data->result();
	}

	function find($id)
	{
		$this->db->select("simpanan_pokok.*, anggota.nama_anggota, DATE_FORMAT(tanggal_disetorkan, '%d-%m-%Y') AS tgl_disetorkan");
		$this->db->join('anggota', 'simpanan_pokok.id_anggota = anggota.id_anggota', 'left');
		$data = $this->db->get_where('simpanan_pokok', ['id_simp_pokok' => $id]);
		return $data->row();
	}

	function insert($data)
	{
		$data = $this->db->insert('simpanan_pokok', $data);
		return $data;
	}

	function update($id, $data)
	{
		$data = $this->db->update('simpanan_pokok', $data, ['id_simp_pokok' => $id]);
		return $data;
	}

	function del($id)
	{
		$data = $this->db->delete('simpanan_pokok', ['id_simp_pokok' => $id]);
		return $data;
	}

}

/* End of file SimpananPokokModel.php */
/* Location: ./application/models/SimpananPokokModel.php */
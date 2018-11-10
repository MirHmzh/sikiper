<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpananWajibModel extends CI_Model {

	function get()
	{
		$this->db->select("simpanan_wajib.*, anggota.nama_anggota, DATE_FORMAT(tanggal_disetorkan, '%d-%m-%Y') AS tgl_disetorkan");
		$this->db->join('anggota', 'simpanan_wajib.id_anggota = anggota.id_anggota', 'left');
		$data = $this->db->get('simpanan_wajib');
		return $data->result();
	}

	function find($id)
	{
		$this->db->select("simpanan_wajib.*, anggota.nama_anggota, DATE_FORMAT(tanggal_disetorkan, '%Y-%m-%d') AS tgl_disetorkan");
		$this->db->join('anggota', 'simpanan_wajib.id_anggota = anggota.id_anggota', 'left');
		$data = $this->db->get_where('simpanan_wajib', ['id_simp_wajib' => $id]);
		return $data->row();
	}

	function insert($data)
	{
		$data = $this->db->insert('simpanan_wajib', $data);
		return $data;
	}

	function update($id, $data)
	{
		$data = $this->db->update('simpanan_wajib', $data, ['id_simp_wajib' => $id]);
		return $data;
	}

	function del($id)
	{
		$data = $this->db->delete('simpanan_wajib', ['id_simp_wajib' => $id]);
		return $data;
	}



}
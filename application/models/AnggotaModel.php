<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaModel extends CI_Model {

	function get()
	{
		$this->db->select("*, DATE_FORMAT(tanggal_bergabung, '%d-%m-%Y %H:%i') AS tgl_bergabung");
		$data = $this->db->get('anggota');
		return $data->result();
	}

	function find($id)
	{
		$this->db->select("*, DATE_FORMAT(tanggal_bergabung, '%d-%m-%Y %H:%i') AS tgl_bergabung");
		$data = $this->db->get_where('anggota', ['id_anggota' => $id]);
		return $data->row();
	}

	function insert($data)
	{
		$data = $this->db->insert('anggota', $data);
		return $data;
	}

	function update($id, $data)
	{
		$data = $this->db->update('anggota', $data, ['id_anggota' => $id]);
		return $data;
	}

	function del($id)
	{
		$data = $this->db->delete('anggota', ['id_anggota' => $id]);
		return $data;
	}

}

/* End of file AnggotaModel.php */
/* Location: ./application/models/AnggotaModel.php */
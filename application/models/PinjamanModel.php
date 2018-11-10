<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamanModel extends CI_Model {

	function get()
	{
		$this->db->select('pinjaman.*, COUNT(id_angsuran) as jumlah_angsuran, anggota.nama_anggota');
		$this->db->join('anggota', 'anggota.id_anggota = pinjaman.id_anggota', 'left');
		$this->db->join('angsuran', 'angsuran.id_pinjaman = pinjaman.id_pinjaman', 'left');
		$this->db->group_by('id_pinjaman');
		$data = $this->db->get('pinjaman');
		return $data->result();
	}

	function find($id)
	{
		$this->db->select('pinjaman.*, COUNT(id_angsuran) as jumlah_angsuran, anggota.nama_anggota');
		$this->db->join('anggota', 'anggota.id_anggota = pinjaman.id_anggota', 'left');
		$this->db->join('angsuran', 'angsuran.id_pinjaman = pinjaman.id_pinjaman', 'left');
		$this->db->group_by('id_pinjaman');
		$this->db->where('id_pinjaman', $id);
		$data = $this->db->get('pinjaman');
		return $data->result();
	}

	function insert($data)
	{
		$trans = $this->db->insert('pinjaman', $data);
		return $trans;
	}

	function update($id, $data)
	{
		$trans = $this->db->update('pinjaman', $data, $id);
		return $trans;
	}

	function del($id)
	{
		$trans = $this->db->delete('pinjaman', $id);
		return $trans;
	}

}

/* End of file PinjamanModel.php */
/* Location: ./application/models/PinjamanModel.php */
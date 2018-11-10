<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AngsuranModel extends CI_Model {

	function get()
	{
		$this->db->select('pinjaman.*, SUM(angsuran.nominal_angsuran) AS jumlah_terangsur, COUNT(angsuran.angsuran_ke) AS jumlah_diangsur');
		$this->db->join('angsuran', 'angsuran.id_pinjaman = pinjaman.id_pinjaman', 'left');
		$this->db->group_by('pinjaman.id_pinjaman');
		$data = $this->db->get('pinjaman');
		return $data->result();
	}

	function find($id)
	{
		$this->db->select('pinjaman.*, SUM(angsuran.nominal_angsuran) AS jumlah_terangsur, COUNT(angsuran.angsuran_ke) AS jumlah_diangsur');
		$this->db->join('angsuran', 'angsuran.id_pinjaman = pinjaman.id_pinjaman', 'left');
		$this->db->group_by('pinjaman.id_pinjaman');
		$data = $this->db->get_where('pinjaman', ['pinjaman.id_pinjaman' => $id]);
		return $data->row();
	}

	function insert($data)
	{
		$trans = $this->db->insert('angsuran', $data);
		return $trans;
	}

	function update($id, $data)
	{
		$trans = $this->db->update('angsuran', $data, ['id_angsuran' => $id]);
		return $trans;
	}

	function del($id)
	{
		$trans = $this->db->delete('angsuran', ['id_pinjaman' => $id]);
		return $trans;
	}

}

/* End of file AngsuranModel.php */
/* Location: ./application/models/AngsuranModel.php */
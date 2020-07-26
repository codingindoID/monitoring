<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model {

	function get_kunjungan_filter($where){
		$this->db->order_by('tgl_kunjungan', 'asc');
		return $this->db->get_where('tb_kunjungan', $where);
	}

	function get_kunjungan(){
		$this->db->order_by('tgl_kunjungan', 'asc');
		return $this->db->get('tb_kunjungan');
	}

	function cek_pengunjung($where){
		return $this->db->get_where('tb_pengunjung', $where);
	}


	function tambah_kunjungan($data){
		$this->db->insert('tb_kunjungan', $data);
	}	

	function get_kunjungan_by_id($where)
	{
		$this->db->order_by('tgl_kunjungan', 'asc');
		return $this->db->get_where('tb_kunjungan', $where);
	}

	function keluar($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tb_kunjungan', $data);
	}

	/*get data kendaraan*/
	function get_data()
	{
		$this->db->select('*');
		$this->db->from('tb_data_kendaraan');
		$this->db->join('tb_status_kepemilikan', 'tb_status_kepemilikan.id_kepemilikan=tb_data_kendaraan.id_kepemilikan');
		$this->db->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_data_kendaraan.perusahaan');
		$this->db->join('tb_merek', 'tb_merek.id_merek = tb_data_kendaraan.merek');
		return $this->db->get();
	}

	/*get data kendaraan by no_pol*/
	function get_data_by_id($where)
	{
		$this->db->select('*');
		$this->db->from('tb_data_kendaraan');
		$this->db->join('tb_status_kepemilikan', 'tb_status_kepemilikan.id_kepemilikan=tb_data_kendaraan.id_kepemilikan');
		$this->db->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_data_kendaraan.perusahaan');
		$this->db->join('tb_merek', 'tb_merek.id_merek = tb_data_kendaraan.merek');
		$this->db->where($where);
		return $this->db->get();
	}

	/*cek apakah ada no-pol yang sudah masuk dan belum keluar*/
	function cek_no_pol($where)
	{
		$this->db->select('*');
		$this->db->from('tb_kunjungan');
		$this->db->where($where);
		$this->db->where('tb_kunjungan.jam_keluar', null);
		return $this->db->get();
	}

}

/* End of file M_beranda.php */
/* Location: ./application/modules/beranda/models/M_beranda.php */
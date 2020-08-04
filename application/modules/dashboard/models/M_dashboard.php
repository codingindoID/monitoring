<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	function get_kunjungan_filter($where){
		$this->db->order_by('tgl_kunjungan', 'asc');
		return $this->db->get_where('tb_kunjungan', $where);
	}

	function get_kunjungan_status($where,$status){
		$where2 = array(
			'jenis_kunjungan'	=> $status
		);

		$this->db->select('*');
		$this->db->from('tb_kunjungan');
		$this->db->where($where);
		$this->db->where($where2);
		$this->db->order_by('tgl_kunjungan', 'asc');
		return $this->db->get();
	}

	function get_kunjungan_rutin($where,$status){
		$where2 = array(
			'jenis_kunjungan'	=> $status
		);

		$this->db->select('*');
		$this->db->from('tb_kunjungan');
		$this->db->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_kunjungan.perusahaan');
		$this->db->where($where);
		$this->db->where($where2);
		$this->db->order_by('tgl_kunjungan', 'asc');
		return $this->db->get();
	}


	function get_kunjungan_non_rutin($where,$status){
		$where2 = array(
			'jenis_kunjungan'	=> $status
		);

		$this->db->select('*');
		$this->db->from('tb_kunjungan');
		$this->db->where($where);
		$this->db->where($where2);
		$this->db->order_by('tgl_kunjungan', 'asc');
		return $this->db->get();
	}

	function bulan()
	{
		return $this->db->get('bulan');
	}

	function tahun()
	{
		return $this->db->get('tahun');
	}


	function get_statistik($tahun,$bulan,$jenis){
		$where = array(
			'tahun'				=> $tahun,
			'bulan'				=> $bulan,
			'jenis_kunjungan'	=> $jenis
		);

		return $this->db->get_where('tb_kunjungan', $where);
	}

	function keluar($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tb_kunjungan', $data);
	}
	
	/*MENU SUPER ADMIN*/
	function hapus_kunjungan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file M_dashboard.php */
/* Location: ./application/modules/dashboard/models/M_dashboard.php */
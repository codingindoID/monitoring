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

}

/* End of file M_beranda.php */
/* Location: ./application/modules/beranda/models/M_beranda.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model {

	function get_kunjungan_filter($where){
		return $this->db->get_where('tb_kunjungan', $where);
	}

	function cek_pengunjung($where){
		return $this->db->get('tb_pengunjung', $where);
	}


	function tambah_kunjungan($data){
		$this->db->insert('tb_kunjungan', $data);
	}	

}

/* End of file M_beranda.php */
/* Location: ./application/modules/beranda/models/M_beranda.php */
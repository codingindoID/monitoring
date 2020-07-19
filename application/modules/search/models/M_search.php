<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_search extends CI_Model {

	//search
	function search($cari)
	{
		$this->db->select('*');
		$this->db->from('tb_kunjungan');
		$this->db->like('id_kunjungan', $cari, 'BOTH');
		$this->db->or_like('driver',  $cari, 'BOTH');
		$this->db->or_like('no_pol',  $cari, 'BOTH');
		$this->db->or_like('tgl_kunjungan',  $cari, 'BOTH');
		return $this->db->get();
	}
}

/* End of file M_search.php */
/* Location: ./application/modules/search/models/M_search.php */
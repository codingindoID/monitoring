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

}

/* End of file M_dashboard.php */
/* Location: ./application/modules/dashboard/models/M_dashboard.php */
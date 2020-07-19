<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengunjung extends CI_Model {

	function get_pengunjung()
	{
		return $this->db->get('tb_pengunjung');
	}

	function jumlah_kunjungan_by_id($where)
	{
		return $this->db->get_where('tb_kunjungan',$where);
	}	

	function tambah_pengunjung($data)
	{
		$this->db->insert('tb_pengunjung',$data);
	}


	function get_pengunjung_by_id($where)
	{
		return $this->db->get_where('tb_pengunjung',$where);
	}	

	function update_pengunjung($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_pengunjung', $data);
	}

	function hapus($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_pengunjung');
	}


}

/* End of file M_pengunjung.php */
/* Location: ./application/modules/pengunjung/models/M_pengunjung.php */
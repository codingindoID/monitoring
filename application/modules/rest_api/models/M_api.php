<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_api extends CI_Model {

	function get_kendaraan_by_id($where)
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

	function tambah_kunjungan($data){
		$this->db->insert('tb_kunjungan', $data);
	}	

}

/* End of file M_api.php */
/* Location: ./application/modules/rest_api/models/M_api.php */
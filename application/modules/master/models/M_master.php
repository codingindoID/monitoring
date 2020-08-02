<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

	function input_perusahaan($data)
	{
		$this->db->insert('tb_perusahaan', $data);
	}

	function get_perusahaan()
	{
		return $this->db->get('tb_perusahaan');
	}

	function input_driver($data)
	{
		$this->db->insert('tb_pegawai', $data);
	}

	function get_driver()
	{
		$this->db->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_pegawai.id_perusahaan');
		return $this->db->get('tb_pegawai');
	}

	function get_merek()
	{
		return $this->db->get('tb_merek');
	}

	function input_merek($data)
	{
		$this->db->insert('tb_merek', $data);
	}

	/*all function hapus*/
	function hapus($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function input_data_kendaraan($data)
	{
		$this->db->insert('tb_data_kendaraan', $data);
	}

	function update_data_kendaraan($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_data_kendaraan', $data);
	}

	function update_kunjungan($no_pol,$perusahaan)
	{
		$where = array(
			'no_pol'	=> $no_pol,
		);
		$data = array(
			'perusahaan'	=> $perusahaan
		);

		$this->db->where($where);
		$this->db->update('tb_kunjungan', $data);
	}

	function get_data()
	{
		$this->db->select('*');
		$this->db->from('tb_data_kendaraan');
		$this->db->join('tb_status_kepemilikan', 'tb_status_kepemilikan.id_kepemilikan=tb_data_kendaraan.id_kepemilikan');
		$this->db->join('tb_perusahaan', 'tb_perusahaan.id_perusahaan = tb_data_kendaraan.perusahaan');
		$this->db->join('tb_merek', 'tb_merek.id_merek = tb_data_kendaraan.merek');
		return $this->db->get();
	}

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

}

/* End of file M_master.php */
/* Location: ./application/modules/master/models/M_master.php */
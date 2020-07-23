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

}

/* End of file M_master.php */
/* Location: ./application/modules/master/models/M_master.php */
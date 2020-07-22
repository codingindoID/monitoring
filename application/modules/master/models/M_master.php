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

}

/* End of file M_master.php */
/* Location: ./application/modules/master/models/M_master.php */
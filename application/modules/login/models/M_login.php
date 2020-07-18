<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function proses_login($where)
	{
		return $this->db->get_where('tb_user',$where);
	}
}

/* End of file M_login.php */
/* Location: ./application/modules/login/models/M_login.php */
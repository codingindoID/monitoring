<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
	}
	public function tahun()
	{
		$tahun['tahun'] = $this->M_master->get_tahun()->result();
		echo json_encode($tahun);
	}

}

/* End of file master.php */
/* Location: ./application/controllers/master.php */
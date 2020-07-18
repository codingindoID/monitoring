<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends MY_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_index');
		$this->load->view('footer');
		$this->load->view('right_pane');
		$this->load->view('script_js');
	}

}

/* End of file Tema.php */
/* Location: ./application/modules/tema/controllers/Tema.php */
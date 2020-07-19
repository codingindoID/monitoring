<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_search');
	}
	public function index()
	{
		if ($this->session->userdata('ses_username')){
			$cari = $this->input->post('cari');
			$data['title']	= "hasil pencarian";
			$data['sub']	= "";
			$data['icon']	= "fa-search";

			$data['kunjungan']	= $this->M_search->search($cari)->result();
			//echo json_encode($data);
			$this->template->load('tema/v_index','hasil_cari',$data);
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Search.php */
/* Location: ./application/modules/search/controllers/Search.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
		$this->load->model('M_master');
	}

	public function index()
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$data['title']		= 'Dashboard';
			$data['sub']		= ' ';
			$data['icon']		= "fa-dashboard";
			$data['start']		= '2020-01-01';
			$data['end']		= date('Y-m-d');

			$queri	 	= "tgl_kunjungan between '2020-01-01' and '".date('Y-m-d')."'";
			$data['total']	= $this->M_dashboard->get_kunjungan_filter($queri)->num_rows();
			$data['rutin']	= $this->M_dashboard->get_kunjungan_status($queri,'rutin')->num_rows();
			$data['non']	= $this->M_dashboard->get_kunjungan_status($queri,'non_rutin')->num_rows();
			$data['tahun']	= $this->M_master->get_tahun()->result();
			//echo $queri;
			$this->template->load('tema/v_index','v_dashboard',$data);
		}else{
			redirect('login','refresh');
		}
	}

	public function filter()
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$st_q 		=  $this->input->post('startdate');
			$start 		= date('Y-m-d',strtotime($st_q)) ;

			$end_q 		= $this->input->post('enddate');
			$end 		=  date('Y-m-d',strtotime($end_q));

			$id_user	= $this->session->userdata('ses_id');
			$queri	 	= "tgl_kunjungan between '".$start."' and '".$end."'";

			$data['title']		= 'Dashboard';
			$data['sub']		= ' ';
			$data['icon']		= "fa-dashboard";
			$data['start']		= $start;
			$data['end']		= $end;

			$data['total']	= $this->M_dashboard->get_kunjungan_filter($queri)->num_rows();
			$data['rutin']	= $this->M_dashboard->get_kunjungan_status($queri,'rutin')->num_rows();
			$data['non']	= $this->M_dashboard->get_kunjungan_status($queri,'non_rutin')->num_rows();
			//echo $queri;
			$this->template->load('tema/v_index','v_dashboard',$data);
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function index()
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$data['title']		= 'Dashboard';
			$data['sub']		= ' ';
			$data['icon']		= "fa-dashboard";
			$data['start']		= date('Y').'-01-01';
			$data['end']		= date('Y-m-d');

			$queri	 	= "tgl_kunjungan between '".date('Y')."-01-01' and '".date('Y-m-d')."'";
			$data['total']	= $this->M_dashboard->get_kunjungan_filter($queri)->num_rows();
			$data['rutin']	= $this->M_dashboard->get_kunjungan_status($queri,'rutin')->num_rows();
			$data['non']	= $this->M_dashboard->get_kunjungan_status($queri,'non_rutin')->num_rows();
			$data['filter_tahun']	= $this->M_dashboard->tahun()->result();
			//echo $queri;

			$bulan = $this->M_dashboard->bulan()->result();
			$no = 0;

			/*chart rutin*/
			foreach ($bulan as $bulan) {
				/*chart rutin*/
				$rutin[$no] = array(
					'hasil' => $this->M_dashboard->get_statistik(date('Y'),$bulan->id_bulan,'rutin')->num_rows()
				);

				/*chart non rutin*/
				$non_rutin[$no] = array(
					'hasil'	=> $this->M_dashboard->get_statistik(date('Y'),$bulan->id_bulan,'non_rutin')->num_rows()
				);
				$no++;
			}
			$data['chart_rutin'] 		= array_column($rutin, 'hasil');
			$data['chart_non_rutin'] 	= array_column($non_rutin, 'hasil');
			$data['tahun']				= date('Y');
			//echo json_encode($data);
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

			$data['total']			= $this->M_dashboard->get_kunjungan_filter($queri)->num_rows();
			$data['rutin']			= $this->M_dashboard->get_kunjungan_status($queri,'rutin')->num_rows();
			$data['non']			= $this->M_dashboard->get_kunjungan_status($queri,'non_rutin')->num_rows();
			$data['filter_tahun']	= $this->M_dashboard->tahun()->result();
			//echo $queri;
			$bulan = $this->M_dashboard->bulan()->result();
			$no = 0;

			/*chart rutin*/
			foreach ($bulan as $bulan) {
				/*chart rutin*/
				$rutin[$no] = array(
					'hasil' => $this->M_dashboard->get_statistik(date('Y'),$bulan->id_bulan,'rutin')->num_rows()
				);

				/*chart non rutin*/
				$non_rutin[$no] = array(
					'hasil'	=> $this->M_dashboard->get_statistik(date('Y'),$bulan->id_bulan,'non_rutin')->num_rows()
				);
				$no++;
			}
			$data['chart_rutin'] 		= array_column($rutin, 'hasil');
			$data['chart_non_rutin'] 	= array_column($non_rutin, 'hasil');
			$this->template->load('tema/v_index','v_dashboard',$data);
		}else{
			redirect('login','refresh');
		}
	}

	function rutin()
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$data['title']		= 'Dashboard';
			$data['sub']		= 'rekap kunjungan rutin';
			$data['icon']		= "fa-dashboard";
			$data['start']		= date('Y').'-01-01';
			$data['end']		= date('Y-m-d');
			$queri	 			= "tgl_kunjungan between '".date('Y')."-01-01' and '".date('Y-m-d')."'";
			$data['kunjungan']			= $this->M_dashboard->get_kunjungan_rutin($queri,'rutin')->result();
			//echo json_encode($data);
			$this->template->load('tema/v_index','v_rutin',$data);
		}else{
			redirect('login','refresh');
		}
	}

	function non_rutin()
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$data['title']		= 'Dashboard';
			$data['sub']		= 'rekap kunjungan non rutin';
			$data['icon']		= "fa-dashboard";
			$data['start']		= date('Y').'-01-01';
			$data['end']		= date('Y-m-d');
			$queri	 			= "tgl_kunjungan between '".date('Y')."-01-01' and '".date('Y-m-d')."'";
			$data['kunjungan']			= $this->M_dashboard->get_kunjungan_non_rutin($queri,'non_rutin')->result();

			$this->template->load('tema/v_index','v_non_rutin',$data);
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
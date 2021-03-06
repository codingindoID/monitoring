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

	function chart($tahun)
	{
		$bulan = $this->M_dashboard->bulan()->result();
		$no = 0;

		/*chart rutin*/
		foreach ($bulan as $bulan) {
			/*chart rutin*/
			$rutin[$no] = array(
				'hasil' => $this->M_dashboard->get_statistik($tahun,$bulan->id_bulan,'rutin')->num_rows()
			);

			/*chart non rutin*/
			$non_rutin[$no] = array(
				'hasil'	=> $this->M_dashboard->get_statistik($tahun,$bulan->id_bulan,'non_rutin')->num_rows()
			);
			$no++;
		}
		$data['chart_rutin'] 		= array_column($rutin, 'hasil');
		$data['chart_non_rutin'] 	= array_column($non_rutin, 'hasil');

		echo json_encode($data);
	}
	function aksi_filter($s,$e)
	{
		$start 		= date('Y-m-d',strtotime($s)) ;
		$end 		=  date('Y-m-d',strtotime($e));

		$id_user	= $this->session->userdata('ses_id');
		$queri	 	= "tgl_kunjungan between '".$start."' and '".$end."'";

		$data['total']			= $this->M_dashboard->get_kunjungan_filter($queri)->num_rows();
		$data['rutin']			= $this->M_dashboard->get_kunjungan_status($queri,'rutin')->num_rows();
		$data['non']			= $this->M_dashboard->get_kunjungan_status($queri,'non_rutin')->num_rows();

		echo json_encode($data);
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
			$data['kunjungan']	= $this->M_dashboard->get_kunjungan_status($queri,'rutin')->result();
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
			$data['kunjungan']	= $this->M_dashboard->get_kunjungan_status($queri,'non_rutin')->result();

			$this->template->load('tema/v_index','v_non_rutin',$data);
		}else{
			redirect('login','refresh');
		}
	}

	/*aksi keluar dari beranda*/
	public function aksi_keluar()
	{
		$lvl 	= $this->session->userdata('ses_level');

		if ($lvl){
			date_default_timezone_set("Asia/Bangkok");
			$where = array(
				'id_kunjungan'	=> $this->input->post('id_kunjungan')
			);

			$data = array(
				'jam_keluar'	=> date('H:i:s'),
				'tgl_keluar'	=> date('Y-m-d')
			);

			
			$cek = $this->M_dashboard->keluar($where,$data);
			if (!$cek) {
				$jenis = $this->input->post('jenis');
				$this->session->set_flashdata('success','kunjungan dengan id : '.$this->input->post('id_kunjungan')." telah selesai");
				
				if ($jenis=='1') {
					redirect('dashboard/rutin','refresh');
				}else{
					redirect('dashboard/non_rutin','refresh');
				}
				
			}else{
				$this->session->set_flashdata('warning','ups,ada yang salah');
				if ($jenis=='1') {
					redirect('dashboard/rutin','refresh');
				}else{
					redirect('dashboard/non_rutin','refresh');
				}
			}

		}else{
			redirect('login','refresh');
		}
	}

	/*MENU SUPER ADMIN*/
	function hapus_kunjungan($id,$param)
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl=='2'){
			$where = array(
				'id_kunjungan'		=> $id
			);

			$cek = $this->M_dashboard->hapus_kunjungan($where,'tb_kunjungan');
			if (!$cek) {
				$this->session->set_flashdata('warning','Kunjungan Berhasil Dihapus');
				if($param == 'rutin'){
					redirect('dashboard/rutin','refresh');
				}else{
					redirect('dashboard/non_rutin','refresh');
				}
				
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah,.');
				if($param == 'rutin'){
					redirect('dashboard/rutin','refresh');
				}else{
					redirect('dashboard/non_rutin','refresh');
				}
			}

		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
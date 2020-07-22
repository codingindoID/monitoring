<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_beranda');
	}
	public function index()
	{
		if ($this->session->userdata('ses_username')) {
			$where = array(
				'tgl_kunjungan'	=> date('Y-m-d')
			);

			$data['title']		= 'Monitoring';
			$data['sub']		= 'kunjungan hari ini';
			$data['icon']		= "fa-exchange";
			$data['kunjungan']	= $this->M_beranda->get_kunjungan_filter($where)->result();
			$this->template->load('tema/v_index','v_hari_ini',$data);
		}else{
			redirect('login','refresh');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('ses_username')) {
			$data['title']		= 'Filter';
			$data['sub']		= '';
			$data['kunjungan']	= null;
			$data['icon']		= "fa-filter";
			$data['start']		= null;
			$data['end']		= null;
			$this->template->load('tema/v_index','v_filter',$data);
		}else{
			redirect('login','refresh');
		}
	}

	public function filter_on()
	{
		if ($this->session->userdata('ses_username')) {
			$st_q 		=  $this->input->post('startdate');
			$start 		= date('Y-m-d',strtotime($st_q)) ;

			$end_q 		= $this->input->post('enddate');
			$end 		=  date('Y-m-d',strtotime($end_q));

			$id_user	= $this->session->userdata('ses_id');
			$queri	 	= "tgl_kunjungan between '".$start."' and '".$end."'";

			$data['title']		= 'Filter';
			$data['sub']		= 'hasil';
			$data['icon']		= "fa-filter";
			$data['start']		= $start;
			$data['end']		= $end;
			$data['kunjungan']	= $this->M_beranda->get_kunjungan_filter($queri)->result();
			$this->template->load('tema/v_index','v_filter',$data);
			//echo json_encode($data);
		}else{
			redirect('login','refresh');
		}
	}

	public function aksi_input()
	{
		$lvl 	= $this->session->userdata('ses_level');

		if ($lvl){
			date_default_timezone_set("Asia/Bangkok");
			//inisialisasi
			$id 		= uniqid(8);
			$lvl 		= $this->session->userdata('ses_level');
			$np_rut		= $this->input->post('nopol_rutin');
			$np_non		= $this->input->post('nopol_non');
			$driver		= $this->input->post('driver');
			$jam_masuk	= date('H:i:s');
			$tgl		= date('Y-m-d');
			//end inisialisasi

			$jenis = $this->input->post('jenis');
			if ($jenis=='rutin') {
				$where = array(
					'no_pol' 	=> $np_rut
				);
				$cek = $this->M_beranda->cek_pengunjung($where)->row();
				if ($cek) {
					$data = array(
						'id_kunjungan'		=> $id,
						'jam_masuk'			=> $jam_masuk,
						'tgl_kunjungan'		=> $tgl,
						'no_pol'			=> $cek->no_pol,
						'jenis_kunjungan' 	=> 'rutin',
						'driver'			=> $cek->driver
					);
					$cek2 = $this->M_beranda->tambah_kunjungan($data);
					if (!$cek2) {
						$this->session->set_flashdata('success','kunjungan ditambahkan');
						redirect('beranda');
					}else{
						$this->session->set_flashdata('warning','ups,ada yang salah');
						redirect('beranda');
					}
				}else{
					$this->session->set_flashdata('warning','data masukan salah');
					redirect('beranda','refresh');
				}

			}else{
				//kunjungan non rutin
				$data = array(
					'id_kunjungan'	=> $id,
					'jam_masuk'		=> $jam_masuk,
					'tgl_kunjungan'	=> $tgl,
					'no_pol' 		=> $np_non,
					'driver'		=> $driver
				);
				$cek = $this->M_beranda->tambah_kunjungan($data);
				if (!$cek) {
					$this->session->set_flashdata('success','kunjungan ditambahkan');
					redirect('beranda');
				}else{
					$this->session->set_flashdata('warning','ups,ada yang salah');
					redirect('beranda');
				}
			}
			
		}else{
			redirect('login','refresh');
		}
		
	}


	//detil modal
	public function detil_modal($id)
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$where = array(
				'id_kunjungan'	=> $id
			);
			$data = $this->M_beranda->get_kunjungan_by_id($where)->row();
			echo json_encode($data);
		}else{
			redirect('login','refresh');
		}
	}

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

			$cek = $this->M_beranda->keluar($where,$data);
			if (!$cek) {
				$this->session->set_flashdata('success','kunjungan dengan id : '.$this->input->post('id_kunjungan')." telah selesai");
				redirect('beranda');
			}else{
				$this->session->set_flashdata('warning','ups,ada yang salah');
				redirect('beranda');
			}

		}else{
			redirect('login','refresh');
		}
	}


	//cetak all
	function cetak_all()
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$data['kunjungan']	= $this->M_beranda->get_kunjungan()->result();
			$this->load->view('cetak/cetak_all', $data);
		}else{
			redirect('login','refresh');
		}
	}

	//cetak all
	function cetak_filter($start,$end)
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$queri	 			= "tgl_kunjungan between '".$start."' and '".$end."'";
			$data['kunjungan']	= $this->M_beranda->get_kunjungan_filter($queri)->result();
			$data['start']		= $start;
			$data['end']		= $end;
			$this->load->view('cetak/cetak_filter', $data);
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Beranda.php */
/* Location: ./application/modules/beranda/controllers/Beranda.php */
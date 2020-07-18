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
			$data['kunjungan']	= $this->M_beranda->get_kunjungan_filter($where)->result();
			$this->template->load('tema/v_index','v_hari_ini',$data);
		}else{
			redirect('login','refresh');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('ses_username')) {
			$data['title']	= 'monitoring';
			$data['sub']	= '';
			$this->template->load('tema/v_index','v_filter',$data);
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
						'id_kunjungan'	=> $id,
						'jam_masuk'		=> $jam_masuk,
						'tgl_kunjungan'	=> $tgl,
						'no_pol'		=> $cek->no_pol,
						'driver'		=> $cek->driver
					);
					$cek = $this->M_beranda->tambah_kunjungan($data);
					if (!$cek) {
						$this->session->set_flashdata('success','kunjungan ditambahkan');
						redirect('beranda');
					}else{
						$this->session->set_flashdata('warning','ups,ada yang salah');
						redirect('beranda');
					}
				}else{
					$this->session->set_flashdata('warning','data masukan salah');
					redirect('beranda');
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

}

/* End of file Beranda.php */
/* Location: ./application/modules/beranda/controllers/Beranda.php */
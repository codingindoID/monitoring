<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
	}
	public function perusahaan()
	{
		$data['title']		= 'Master';
		$data['sub']		= 'data perusahaan';
		$data['icon']		= "fa-gear";
		$data['perusahaan']		= $this->M_master->get_perusahaan()->result();
		$this->template->load('tema/v_index','master_perusahaan',$data);
	}

	public function  input_perusahaan()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data = array(
				'nama_perusahaan'		=> $this->input->post('nama_perusahaan'),
				'deskripsi_perusahaan'	=> $this->input->post('deskripsi_perusahaan')
			);
			$cek = $this->M_master->input_perusahaan($data);
			if (!$cek) {
				$this->session->set_flashdata('success','Perusahaan berhasil didaftarkan');
				redirect('master/perusahaan','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah,.');
				redirect('master/perusahaan','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}


	//master pegawai
	public function driver()
	{
		$data['title']		= 'Master';
		$data['sub']		= 'data driver';
		$data['icon']		= "fa-user";
		$data['perusahaan']		= $this->M_master->get_perusahaan()->result();
		$data['driver']		= $this->M_master->get_driver()->result();
		$this->template->load('tema/v_index','master_pegawai',$data);
		//echo json_encode($data);
		//$this->load->view('master_pegawai', $data, FALSE);
	}

	public function  input_driver()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data = array(
				'id_pegawai'			=> uniqid(6),
				'nama_pegawai'			=> $this->input->post('nama'),
				'id_perusahaan'			=> $this->input->post('perusahaan')
			);
			$cek = $this->M_master->input_driver($data);
			if (!$cek) {
				$this->session->set_flashdata('success','Perusahaan berhasil didaftarkan');
				redirect('master/driver','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah,.');
				redirect('master/driver','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	//master pegawai
	public function merek()
	{
		$data['title']		= 'Master';
		$data['sub']		= 'data merek';
		$data['icon']		= "fa-car";
		$data['perusahaan']	= $this->M_master->get_perusahaan()->result();
		$data['driver']		= $this->M_master->get_driver()->result();
		$this->template->load('tema/v_index','master_merek',$data);
		//echo json_encode($data);
		//$this->load->view('master_pegawai', $data, FALSE);
	}

	public function  input_merek()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data = array(
				'id_pegawai'			=> uniqid(6),
				'nama_pegawai'			=> $this->input->post('nama'),
				'id_perusahaan'			=> $this->input->post('perusahaan')
			);
			$cek = $this->M_master->input_driver($data);
			if (!$cek) {
				$this->session->set_flashdata('success','Perusahaan berhasil didaftarkan');
				redirect('master/driver','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah,.');
				redirect('master/driver','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file master.php */
/* Location: ./application/controllers/master.php */
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
				'id_perusahaan'			=> uniqid(6),
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
	public function pegawai()
	{
		$data['title']		= 'Master';
		$data['sub']		= 'data pegawai';
		$data['icon']		= "fa-user";
		$data['perusahaan']		= $this->M_master->get_perusahaan()->result();
		$this->template->load('tema/v_index','master_pegawai',$data);
	}

}

/* End of file master.php */
/* Location: ./application/controllers/master.php */
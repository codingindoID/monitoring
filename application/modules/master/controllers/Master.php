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
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data['title']		= 'Master';
			$data['sub']		= 'data perusahaan';
			$data['icon']		= "fa-gear";
			$data['perusahaan']		= $this->M_master->get_perusahaan()->result();
			$this->template->load('tema/v_index','master_perusahaan',$data);
		}else{
			redirect('login','refresh');
		}
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
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data['title']		= 'Master';
			$data['sub']		= 'data driver';
			$data['icon']		= "fa-user";
			$data['perusahaan']	= $this->M_master->get_perusahaan()->result();
			$data['driver']		= $this->M_master->get_driver()->result();
			$this->template->load('tema/v_index','master_pegawai',$data);
		}else{
			redirect('login','refresh');
		}
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
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data['title']		= 'Master';
			$data['sub']		= 'data merek';
			$data['icon']		= "fa-car";
			$data['merek']		= $this->M_master->get_merek()->result();
			$this->template->load('tema/v_index','master_merek',$data);
		}else{
			redirect('login','refresh');
		}
	}

	public function  input_merek()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data = array(
				'id_merek'				=> "MRK-".uniqid(4),
				'merek'					=> $this->input->post('merek')
			);
			$cek = $this->M_master->input_merek($data);
			if (!$cek) {
				$this->session->set_flashdata('success','Merek berhasil didaftarkan');
				redirect('master/merek','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah,.');
				redirect('master/merek','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	function hapus_merek($id)
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$where = array(
				'id_merek'	=> $id
			);

			$cek = $this->M_master->hapus($where,'tb_merek');
			if (!$cek) {
				$this->session->set_flashdata('success','Merek Berhasil Dihapus');
				redirect('master/merek','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah,.');
				redirect('master/merek','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	/*data Kendaraan*/
	function data_kendaraan()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data['title']			= 'Master';
			$data['sub']			= 'data kendaraan';
			$data['icon']			= "fa-car";
			$data['perusahaan']		= $this->M_master->get_perusahaan()->result();
			$data['merek']			= $this->M_master->get_merek()->result();
			$data['kendaraan']		= $this->M_master->get_data()->result();
			//echo json_encode($data);
			$this->template->load('tema/v_index','master_data_kendaraan',$data);
		}else{
			redirect('login','refresh');
		}
	}

	function input_data_kendaraan()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$data = array(
				'id_data'			=> "INV-".uniqid(6),
				'no_pol'		=> $this->input->post('nopol'),
				'pemilik'		=> $this->input->post('pemilik'),
				'perusahaan'		=> $this->input->post('perusahaan'),
				'jenis'			=> $this->input->post('jenis'),
				'merek'			=> $this->input->post('merek'),
				'seri'			=> $this->input->post('seri'),
				'warna'			=> $this->input->post('warna'),
				'id_kepemilikan'	=> $this->input->post('kepemilikan'),
				'tgl_teregistrasi'		=> date('Y-m-d'),
				'tgl_kadaluwarsa'		=> date('Y-m-d',strtotime($this->input->post('dateexp')))
			);
			$cek = $this->M_master->input_data_kendaraan($data);
			if (!$cek) {
				$this->session->set_flashdata('success','Data berhasil didaftarkan');
				redirect('master/data_kendaraan','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah,.');
				redirect('master/data_kendaraan','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file master.php */
/* Location: ./application/controllers/master.php */
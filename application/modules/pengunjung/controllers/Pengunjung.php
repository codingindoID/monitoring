<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengunjung');
	}
	public function index()
	{
		$lvl = $this->session->userdata('ses_level');
		if ($lvl) {
			$data['title']		= 'Data Pengunjung';
			$data['sub']		= ' ';
			$data['icon']		= "fa-car";

			$no = 0;
			$pengunjung	= $this->M_pengunjung->get_pengunjung()->result();
			foreach ($pengunjung as $p) {
				$data['kunjungan'][$no] = array(
					'no_pol'			=> $p->no_pol,
					'driver'			=> $p->driver,
					'tgl_terdaftar'		=> $p->tgl_terdaftar,
					'tgl_update'		=> $p->tgl_update,
					'total_kunjungan'	=> $this->M_pengunjung->jumlah_kunjungan_by_id(array('no_pol' => $p->no_pol))->num_rows()
				);
				$no++;
			}


			$this->template->load('tema/v_index','v_pengunjung',$data);
		}else{
			redirect('login','refresh');
		}
	}

	//tambah pengunjung
	public function tambah_pengunjung()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$no_pol	= $this->input->post('no_pol');
			$driver = $this->input->post('driver');

			$where = array(
				'no_pol'	=> $no_pol
			);

			//cek data user
			$cek = $this->M_pengunjung->jumlah_kunjungan_by_id($where)->row();
			if($cek){
				$this->session->set_flashdata('error','Pengunjung sudah terdaftar sebelumnya');
				redirect('pengunjung','refresh');
			}else{
				$data = array(
					'no_pol'		=> $no_pol,
					'driver'		=> $driver,
					'tgl_terdaftar'	=> date('Y-m-d')
				);

				$cek = $this->M_pengunjung->tambah_pengunjung($data);
				if (!$cek) {
					$this->session->set_flashdata('success','Pengunjung berhasil didaftarkan');
					redirect('pengunjung','refresh');
				}else{
					$this->session->set_flashdata('error','ups, ada yang salah,.');
					redirect('pengunjung','refresh');
				}
			}

		}else{
			redirect('login','refresh');
		}
	}


	//detil modal
	public function detil_modal($no_pol)
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$where = array(
				'no_pol'	=> $no_pol
			);
			$data = $this->M_pengunjung->get_pengunjung_by_id($where)->row();
			echo json_encode($data);
		}else{
			redirect('login','refresh');
		}
	}

	public function update_pengunjung()
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$where = array(
				'no_pol'	=> $this->input->post('no_pol_update')
			);

			$data = array(
				'driver'		=> $this->input->post('driver_update'),
				'tgl_update'	=> date('Y-m-d')
			);
			$cek = $this->M_pengunjung->update_pengunjung($where,$data);
			
			if(!$cek){
				$this->session->set_flashdata('success','Data pengunjung berhasil dipudate');
				redirect('pengunjung','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah');
				redirect('pengunjung','refresh');
			}
		}else{
			redirect('login','refresh');
		}
	}

	public function hapus($id)
	{
		$lvl 	= $this->session->userdata('ses_level');
		if ($lvl){
			$where = array(
				'no_pol'	=> $id
			);
			$cek = $this->M_pengunjung->hapus($where);
			if(!$cek){
				$this->session->set_flashdata('warning','Data pengunjung berhasil dihapus');
				redirect('pengunjung','refresh');
			}else{
				$this->session->set_flashdata('error','ups, ada yang salah');
				redirect('pengunjung','refresh');
			}

		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Pengunjung.php */
/* Location: ./application/modules/pengunjung/controllers/Pengunjung.php */
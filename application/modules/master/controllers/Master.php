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
			$data['sub']			= 'Rekap data kendaraan';
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

	function form_input_kendaraan()
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
			$this->template->load('tema/v_index','form_register',$data);
		}else{
			redirect('login','refresh');
		}
	}

	function input_data_kendaraan()
	{
		$lvl = $this->session->userdata('ses_level');
		if($lvl){
			$id = array(
				'no_pol'	=>  $this->input->post('nopol')
			);

			$cek = $this->M_master->get_data_by_id($id)->num_rows();

			if($cek){
				$this->session->set_flashdata('error','ups, nomor polisi :'.$this->input->post('nopol').' ,sudah terdaftar,.');
				redirect('master/data_kendaraan','refresh');
			}else{
				/*config QR-CODE*/
				$this->load->library('ciqrcode');

				$config['cacheable']    = true; //boolean, the default is true
        		$config['cachedir']     = './assets/'; //string, the default is application/cache/
        		$config['errorlog']     = './assets/'; //string, the default is application/logs/
        		$config['imagedir']     = './assets/image/qr_code/'; //direktori penyimpanan qr code
        		$config['quality']      = true; //boolean, the default is true
        		$config['size']         = '1024'; //interger, the default is 1024
        		$config['black']        = array(224,255,255); // array, default is array(255,255,255)
        		$config['white']        = array(70,130,180); // array, default is array(0,0,0)
        		$this->ciqrcode->initialize($config);

        		$image_name=$this->input->post('nopol').'.png';

        		$params['data'] = $this->input->post('nopol'); //data yang akan di jadikan QR CODE
        		$params['level'] = 'H'; //H=High
        		$params['size'] = 10;
        		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder 
        		$this->ciqrcode->generate($params);
        		/*end config*/

        		$data = array(
        			'id_data'			=> "INV-".uniqid(6),
        			'no_pol'			=> $this->input->post('nopol'),
        			'pemilik'			=> $this->input->post('pemilik'),
        			'perusahaan'		=> $this->input->post('perusahaan'),
        			'jenis'				=> $this->input->post('jenis'),
        			'merek'				=> $this->input->post('merek'),
        			'seri'				=> $this->input->post('seri'),
        			'warna'				=> $this->input->post('warna'),
        			'id_kepemilikan'	=> $this->input->post('kepemilikan'),
        			'tgl_teregistrasi'	=> date('Y-m-d'),
        			'tgl_kadaluwarsa'	=> date('Y-m-d',strtotime($this->input->post('dateexp'))),
        			'qr_code'			=> $image_name
        		);
        		$cek = $this->M_master->input_data_kendaraan($data);
        		if (!$cek) {
        			$this->session->set_flashdata('success','Data berhasil didaftarkan');
        			redirect('master/data_kendaraan','refresh');
        		}else{
        			$this->session->set_flashdata('error','ups, ada yang salah,.');
        			redirect('master/data_kendaraan','refresh');
        		}
        	}


        }else{
        	redirect('login','refresh');
        }
    }

	//detail data kendaraan
    function detil($id)
    {
    	$lvl = $this->session->userdata('ses_level');
    	if($lvl){
    		$where = array(
    			'id_data' => $id
    		);

    		$data = $this->M_master->get_data_by_id($where)->row();
    		echo json_encode($data);
    	}else{
    		redirect('login','refresh');
    	}
    }

	//view edit data
    function edit_kendaraan($id)
    {
    	$lvl = $this->session->userdata('ses_level');
    	if($lvl){
    		$where = array(
    			'id_data' => $id
    		); 

    		$data['title']		= 'Master';
    		$data['sub']		= 'Edit data kendaraan';
    		$data['icon']		= "fa-gear";
    		$data['perusahaan']		= $this->M_master->get_perusahaan()->result();
    		$data['merek']			= $this->M_master->get_merek()->result();
    		$data['kendaraan']		= $this->M_master->get_data_by_id($where)->row();
    		//echo json_encode($data);
    		$this->template->load('tema/v_index','edit_data',$data);
    	}else{
    		redirect('login','refresh');
    	}
    }

    function update_data_kendaraan()
    {
    	$lvl = $this->session->userdata('ses_level');
    	if($lvl){
    		$where = array(
    			'id_data' => $this->input->post('id_data')
    		); 

    		$data = array(
    			'pemilik'			=> $this->input->post('pemilik'),
    			'perusahaan'		=> $this->input->post('perusahaan'),
    			'jenis'				=> $this->input->post('jenis'),
    			'merek'				=> $this->input->post('merek'),
    			'seri'				=> $this->input->post('seri'),
    			'warna'				=> $this->input->post('warna'),
    			'id_kepemilikan'	=> $this->input->post('kepemilikan'),
    			'tgl_kadaluwarsa'	=> date('Y-m-d',strtotime($this->input->post('dateexp')))
    		);
    		$cek = $this->M_master->update_data_kendaraan($where, $data);
    		if (!$cek) {
    			$this->M_master->update_kunjungan($this->input->post('nopol'),$this->input->post('perusahaan'));
    			$this->session->set_flashdata('success','Data berhasil diupdate');
    			redirect('master/data_kendaraan','refresh');
    		}else{
    			$this->session->set_flashdata('error','ups, ada yang salah,.');
    			redirect('master/data_kendaraan','refresh');
    		}
    	}else{

    	}
    }

    //hapus
    function hapus_data_kendaraan($id)
    {
    	$lvl = $this->session->userdata('ses_level');
    	if($lvl){
    		$where = array(
    			'id_data' => $id
    		); 
    		$cek = $this->M_master->hapus($where,'tb_data_kendaraan');
    		if (!$cek) {
    			$this->session->set_flashdata('success','Data Berhasil Dihapus');
    			redirect('master/data_kendaraan','refresh');
    		}else{
    			$this->session->set_flashdata('error','ups, ada yang salah,.');
    			redirect('master/data_kendaraan','refresh');
    		}

    	}else{
    		redirect('login','refresh');
    	}
    }

    //cetak
    function cetak_all()
    {
    	$lvl = $this->session->userdata('ses_level');
    	if($lvl){
    		$data['kendaraan']		= $this->M_master->get_data()->result();
    		$this->load->view('cetak/cetak_all',$data);
    	}else{
    		redirect('login','refresh');
    	}
    }

}

/* End of file master.php */
/* Location: ./application/controllers/master.php */
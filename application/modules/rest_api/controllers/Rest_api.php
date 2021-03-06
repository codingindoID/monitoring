<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_api extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_api');
	}
	public function index($id)
	{
		echo json_encode("ok");
	}

	/*kunjungan Rutin*/
	public function get_data($id)
	{
		$where = array(
			'no_pol'	=> $id
		);
		$data = $this->M_api->get_kendaraan_by_id($where)->row();
		if($data){
			echo json_encode(array(
				'success'	=> 1,
				'no_pol'	=> $data->no_pol,
				'jenis'		=> $data->jenis,
				'merek'		=> $data->merek,
				'seri'		=> $data->seri,
				'pemilik'	=> $data->pemilik
			));
		}else{
			echo json_encode(array(
				'success'	=> 0,
				'message'	=> 'input data baru ?'
			));
		}
	}

	/*seharusnya ini sudah tidak terpakai*/
	public function ijinkan_rutin()
	{
		$where = array(
			'no_pol' => $this->input->post('no_pol')
		);

		/*mengambil detil kendaraan*/
		$detil = $this->M_api->get_kendaraan_by_id($where)->row();
		$data = array(
			'id_kunjungan'		=> "KUNJ-".uniqid(6),
			'no_pol'			=> $detil->no_pol,
			'tgl_kunjungan'		=> date('Y-m-d'),
			'jam_masuk'			=> date('H:i:s'),
			'jenis_kunjungan'	=> 'rutin',
			'driver'			=> $detil->pemilik,
			'perusahaan'		=> $detil->perusahaan,
			'tahun'				=> date('Y'),
			'bulan'				=> date('m')
		);
		$cek2 = $this->M_api->tambah_kunjungan($data);
		if (!$cek2) {
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'kendaraan dengan nomor polisi '. $this->input->post('no_pol').', diijinkan Masuk.'
			));
		}else{
			echo json_encode(array(
				'success'	=> 0,
				'message'	=> 'ups, ada yang salah'
			));
		}
		
	}


	/*tes new API*/
	/*scan barcode masuk ataupun keluar jadi satu*/
	function scan_barcode()
	{
		date_default_timezone_set("Asia/Bangkok");
		$where = array(
			'no_pol' => $this->input->post('no_pol')
		);

		/*cek apakah ada record masuk yang blm selesai*/
		$cek_data = $this->M_api->cek_no_pol($where)->row();
		if($cek_data){
			/*jika data ada maka aksi yang dilakukan adalah penyelesaian kunjungan*/
			$where = array(
				'id_kunjungan'	=> $cek_data->id_kunjungan
			);

			$data = array(
				'jam_keluar'	=> date('H:i:s'),
				'tgl_keluar'	=> date('Y-m-d')
			);

			$cek = $this->M_api->keluar($where,$data);
			if (!$cek) {
				echo json_encode(array(
					'success'	=> 1,
					'message'	=> 'kunjungan dengan id : '. $cek_data->id_kunjungan.', telah selesai.'
				));
			}else{
				echo json_encode(array(
					'success'	=> 0,
					'message'	=> 'ups, ada yang salah'
				));
			}
		}else{
			/*jika data tidak ada maka aksi yang dilakukan adalah input masuk*/
			/*mengambil detil kendaraan*/
			$detil = $this->M_api->get_kendaraan_by_id($where)->row();
			
			$data = array(
				'id_kunjungan'		=> "KUNJ-".uniqid(6),
				'no_pol'			=> $detil->no_pol,
				'tgl_kunjungan'		=> date('Y-m-d'),
				'jam_masuk'			=> date('H:i:s'),
				'jenis_kunjungan'	=> 'rutin',
				'driver'			=> $detil->pemilik,
				'sim'				=> $detil->sim,
				'perusahaan'		=> $detil->perusahaan,
				'tahun'				=> date('Y'),
				'bulan'				=> date('m')
			);

			$cek2 = $this->M_api->tambah_kunjungan($data);
			if (!$cek2) {
				echo json_encode(array(
					'success'	=> 2,
					'no_pol'	=> $detil->no_pol,
					'pemilik'	=> $detil->pemilik,
					'message'	=> 'kendaraan dengan nomor polisi '. $this->input->post('no_pol').', diijinkan Masuk.'
				));
			}else{
				echo json_encode(array(
					'success'	=> 0,
					'message'	=> 'ups, ada yang salah'
				));
			}
		}
	}

	/*input manual*/
	public function cek_input_manual()
	{
		$where = array(
			'no_pol' 	=> $this->input->post('no_pol')
		);

		/*cek apakah nopol tersebut sudah ada di daftar kunjungan blm selesai*/
		$cek_data = $this->M_api->cek_no_pol($where)->row();
		if($cek_data){
			/*jika ada data*/
			echo json_encode(array(
				'success'			=> 1,
				'id_kunjungan'		=> $cek_data->id_kunjungan,
				'no_pol'			=> $cek_data->no_pol,
				'driver'			=> $cek_data->driver,
				'sim'				=> $cek_data->sim,
				'tgl_kunjungan'		=> date('d-F-Y',strtotime($cek_data->tgl_kunjungan)),
				'jam_masuk'			=> $cek_data->jam_masuk,
				'jenis_kunjungan'	=> $cek_data->jenis_kunjungan

			));

		}else{
			/*jika tidak ada*/
			/*cek jenis pengunjung rutin atau tidak*/
			/*arahkan ke function scan_barcode*/
			$cek = $this->M_api->get_kendaraan_by_id($where)->row();
			if($cek){
				echo json_encode(array(
					'success'	=> 2,
					'no_pol'	=> $cek->no_pol,
					'jenis'		=> $cek->jenis,
					'merek'		=> $cek->merek,
					'seri'		=> $cek->seri,
					'pemilik'	=> $cek->pemilik
				));
			}else{
				/*alihkan ke halaman input driver*/
				echo json_encode(array(
					'success'	=> 0,
					'message'	=>	'ini kunjungan tidak rutin'
				));
			}
		}

	}

	/*menangkap inputan aksi masuk dari inputan manual*/
	public function aksi_masuk_manual()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data = array(
			'no_pol'			=> $this->input->post('no_pol'),
			'driver'			=> $this->input->post('driver'),
			'sim'				=> $this->input->post('sim'),
			'perusahaan'		=> $this->input->post('perusahaan'),
			'id_kunjungan'		=> "KUNJ-".uniqid(6),
			'tgl_kunjungan'		=> date('Y-m-d'),
			'jam_masuk'			=> date('H:i:s'),
			'jenis_kunjungan'	=> 'non_rutin',
			'tahun'				=> date('Y'),
			'bulan'				=> date('m')
		);

		/*cek inputan*/
		$cek2 = $this->M_api->tambah_kunjungan($data);
		if (!$cek2) {
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'kendaraan dengan nomor polisi '. $this->input->post('no_pol').', diijinkan Masuk.'
			));
		}else{
			echo json_encode(array(
				'success'	=> 0,
				'message'	=> 'ups, ada yang salah'
			));
		}	
	}

	/*menangkap inputan aksi keluar dari inputan manual*/
	public function aksi_keluar_manual()
	{
		date_default_timezone_set("Asia/Bangkok");
		$where = array(
			'id_kunjungan'	=> $this->input->post('id_kunjungan')
		);
		$data = array(
			'jam_keluar'	=> date('H:i:s'),
			'tgl_keluar'	=> date('Y-m-d')
		);

		/*aksi keluar*/
		$cek = $this->M_api->keluar($where,$data);
		if (!$cek) {
			echo json_encode(array(
				'success'	=> 1,
				'message'	=> 'kunjungan dengan id : '. $this->input->post('id_kunjungan').', telah selesai.'
			));
		}else{
			echo json_encode(array(
				'success'	=> 0,
				'message'	=> 'ups, ada yang salah'
			));
		}
	}

}

/* End of file Rest_api.php */
/* Location: ./application/modules/rest_api/controllers/Rest_api.php */
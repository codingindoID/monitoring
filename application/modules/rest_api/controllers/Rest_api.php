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
		echo json_encode($data);
	}

	public function ijinkan_rutin()
	{
		$where = array(
				'no_pol' => $this->input->post('no_pol')
			);

		$cek_masuk = $this->M_api->cek_no_pol($where)->result();
			if($cek_masuk){
				echo json_encode(array(
					'status' 	=> 0,
					'message'	=> 'ada kunjungan yang belum terselesaikan, anda tidak bisa memasukkan nomor polisi ini sebelum kendaraan tersebut menyelesaikan kunjungannya'
				));
			}else{
				/*mengambil detil kendaraan*/
				$detil = $this->M_api->get_kendaraan_by_id($where)->row();
				
				$data = array(
						'id_kunjungan'		=> "KUNJ-".uniqid(6),
						'no_pol'			=> $detil->no_pol,
						'tgl_kunjungan'		=> date('Y-m-d'),
						'jam_masuk'			=> date('H:i:s'),
						'jenis_kunjungan'	=> 'rutin',
						'driver'			=> $detil->pemilik,
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
	}

}

/* End of file Rest_api.php */
/* Location: ./application/modules/rest_api/controllers/Rest_api.php */
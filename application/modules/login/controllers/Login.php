<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}
	public function index()
	{
		$this->load->view('v_login');
	}

	public function aksi_login()
	{
		$data = array(
			'username'		=> $this->input->post('username'),
			'password'		=> $this->input->post('password')
		);
		
		$cek = $this->M_login->proses_login($data)->num_rows();
		if($cek>=1){
			$cek = $this->M_login->proses_login($data)->row();
			$this->session->set_userdata('ses_username',$cek->username);
			$this->session->set_userdata('ses_id',$cek->id_user);
			$this->session->set_userdata('ses_level',$cek->level);
			redirect('beranda','refresh');
		}else{
			$this->session->set_flashdata('error','username atau password salah');
			redirect('login');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */
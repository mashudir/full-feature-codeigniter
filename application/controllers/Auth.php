<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('auth_model','am');
	}

	public function index()
	{
		$data = array (	'title'		=>'Login Pengguna',
						'isi'		=>'auth'
						);
		$this->load->view('auth',$data, FALSE);
	}

	public function login() {
		$datalogin = array('username' => $this->input->post('username'),
							'password' => $this->input->post('password')
						);
		// var_dump($datalogin);exit();
		$request = $this->am->auth($datalogin);
		// var_dump($request);exit();
		if ($request == 1) {
			$tanggallahir = date('d M Y',strtotime($request->MPG_TGL_LAHIR));
			$this->session->set_userdata('NAMA',$request->MPG_NAMA);
			$this->session->set_userdata('KODE',$request->MPG_KODE);
			$this->session->set_userdata('NIP',$request->MPG_NIP);
			$this->session->set_userdata('FOTO',$request->MPG_FOTO);
			$this->session->set_userdata('ALAMAT',$request->MPG_ALAMAT);
			$this->session->set_userdata('JK',$request->MPG_JK);
			$this->session->set_userdata('TELP',$request->MPG_NO_TELP);
			$this->session->set_userdata('EMAIL',$request->MPG_EMAIL);
			$this->session->set_userdata('AGAMA',$request->REF_AGAMA_NAMA);
			$this->session->set_userdata('TPTLAHIR',$request->MPG_TMPT_LAHIR);
			$this->session->set_userdata('TGLLAHIR',$tanggallahir);
			$this->session->set_userdata('MSU_NAMA',$request->MSU_NAMA);
			$this->session->set_userdata('MSU_KODE',$request->MSU_KODE);
			$this->session->set_userdata('JABATAN',$request->REF_JB_FN_NAMA);
			$this->session->set_flashdata('sukses','Anda Berhasil Login');
			if (substr($request->REF_JAB_KODE, 0,2) == 'KP') {
				redirect('admin');
			}else{
				redirect('pegawai/profile');
			}
		}else{
			redirect('auth');
		}
	}

	public function logout() {
			$this->session->unset_userdata('NAMA');
			$this->session->unset_userdata('NIP');
			$this->session->unset_userdata('ALAMAT');
			$this->session->unset_userdata('JK');
			$this->session->unset_userdata('TELP');
			$this->session->unset_userdata('EMAIL');
			$this->session->unset_userdata('AGAMA');
			$this->session->unset_userdata('TPTLAHIR');
			$this->session->unset_userdata('TGLLAHIR');
			$this->session->unset_userdata('UNIT');
			$this->session->unset_userdata('JABATAN');

			redirect('auth');
	}
}

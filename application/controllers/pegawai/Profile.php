<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('KODE') != NULL) {
			$data = array (	'title'		=>'Profile',
				'isi'		=>'pegawai/profile/list'
			);
			$this->load->view('pegawai/layout/wrapper',$data, FALSE);
		}else{
			redirect('auth');
		}
	}
}

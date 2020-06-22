<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterlogbook extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Masterlogbook_model','mlm');
	}

	public function index() {
		if ($this->session->userdata('KODE') != NULL) {
			$data = array (	'title'		=>'Master Logbook',
				'isi'		=>'admin/listlogbook'
			);
			$this->data['masterlogbook'] = $this->getmasterlogbook();
			$this->data['unit'] = $this->getunit();
			$this->data['jabatan'] = $this->getjabatan();
		// $this->data['levelkesulitan'] = $this->getlevelkesulitan();
		// $this->data['kegiatanlogbook'] = $this->getkegiatan();
		// $this->data['logbookbyid'] = $this->getlogbookbyid();
		// $this->data['coba'] = $this->getkegiatan();
		// var_dump($this->data['logbookbyid']);exit();
			$this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
		}else{
			redirect('auth');
		}
	}

	function getmasterlogbook(){
		$key = $this->session->userdata('MSU_KODE');
		$this->result = $this->mlm->getmasterlogbook_model($key);
		$data = $this->result->result_array();
		// var_dump($data);exit();
		return $data;
	}

	function getjabatan() {
		$data = $this->mlm->getjabatan_model();
		return $data;
	}

	function getunit() {
		$data = $this->mlm->getunit_model();
		return $data;
	}

	function getmasterlogbookbyid() {
		// $kode 	= $this->session->userdata('MSU_KODE');
    	$id 	= $this->input->post('id');
    	$request= $this->mlm->getmasterlogbookbyid_model($id);
    	// var_dump($request);exit();
    	echo json_encode($request);
	}

	function addmasterlogbook() {
		$data = array('MKL_NAMA' => $_POST['namakegiatan'],
					'MKL_KETERANGAN' => $_POST['keterangankegiatan'],
					'MKL_SCORE' => $_POST['score'],
					'MKL_ISAKTIF' => '1',
					'MST_UNIT_MSU_KODE' => $_POST['mstunit'],
					'REF_JN_JB_FNG_RJJABF_KOD' => $_POST['mstjabatan']
		 );
		$request = $this->mlm->savemasterlogbook_model($data);

		if ($request) {
			$maxkode = $this->mlm->getmaxidmasterlogbook_model();
			$savedef = $this->mlm->savedef_model($maxkode['MKL_KODE'],$data);
			
			$result['status'] = 'success';
			$result['message'] = 'Data berhasil diinputkan';
			$result['redirect_url'] = site_url('masterlogbook/');
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}
	}

	function updatemasterlogbook(){
		$data = array('MKL_KODE' => $_POST['idlogbook'],
					'MKL_NAMA' => $_POST['namakegiatan'],
					'MKL_KETERANGAN' => $_POST['keterangankegiatan'],
					'MKL_SCORE' => $_POST['score'],
					'MKL_ISAKTIF' => '1',
					'MST_UNIT_MSU_KODE' => $_POST['mstunit'],
					'REF_JN_JB_FNG_RJJABF_KOD' => $_POST['mstjabatan']
		 );
		// var_dump($data);exit();
		if ($data != null) {
			$request = $this->mlm->updatemasterlogbook_model($data);

			$result['status'] = 'success';
			$result['message'] = 'Data berhasil diubah';
			$result['redirect_url'] = site_url('masterlogbook/');
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}
	}

	public function deletemasterlogbook($id) {
		if(empty($id)){
			redirect('masterlogbook/');
		}else{
			try
			{
				$request = $this->mlm->deletemasterlogbook_model($id);
			}catch( Exception $e){			
			}
			redirect('masterlogbook/');
		}
	}
}
?>
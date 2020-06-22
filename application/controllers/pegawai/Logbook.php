<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logbook extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Logbook_model','lb');
	}
	public function index() {
		if ($this->session->userdata('KODE') != NULL) {
			$data = array (	'title'		=>'Logbook',
				'isi'		=>'pegawai/logbook/list'
			);
			$this->data['logbook'] = $this->getlogbook();
			$this->data['logbooktoday'] = $this->getlogbooktoday();
			$this->data['levelkesulitan'] = $this->getlevelkesulitan();
			$this->data['kegiatanlogbook'] = $this->getkegiatan();
			$this->load->view('pegawai/layout/wrapper',$data,$this->data, FALSE);
		}else{
			redirect('auth');
		}
	}
	public function getkegiatan() {
		$params = $this->session->userdata('KODE');
		$this->result = $this->lb->getkegiatan_model($params);
		return $this->result->result_array();
	}
	public function getlogbooktoday(){
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			'key' 		=> $this->session->userdata('KODE'),
			'datestart' => date("Y-m-d 00:00:00"),
			'dateend' 	=> date("Y-m-d 23:59:59")
		);
		try
		{
			$request = $this->lb->getlogbookdatesorting_model($data);
		}catch( Exception $e){			
		}
		return $request->result_array();
	}
	function getlogbookbyid() {
		$id = $this->input->post('id');
		$request = $this->lb->getlogbookbyid_model($id);
		echo json_encode($request->result());
	}

	public function getlogbookdatesorting() {
		if ($this->session->userdata('KODE') != NULL) {
			$data = array (	'title'		=>'Logbook',
				'isi'		=>'pegawai/logbook/list'
			);
			$jamawal = $this->input->post('datestart');
			$jamahir = $this->input->post('dateend');
		// date_default_timezone_set('Asia/Jakarta');
			$datapost= array (
				'key'		=> $this->session->userdata('KODE'),
				'datestart' => $jamawal.' 00:00:00',
				'dateend' 	=> $jamahir.' 23:59:59');
		// var_dump($datapost);exit();
			if ($datapost == null) {
				redirect('pegawai/logbook');
			}else{
				try
				{
					$request = $this->lb->getlogbookdatesorting_model($datapost);
					$this->data['logbooktoday'] = $request->result_array();
					$this->data['levelkesulitan'] = $this->getlevelkesulitan();
					$this->data['kegiatanlogbook'] = $this->getkegiatan();
				}catch( Exception $e){			
				}
				$this->load->view('pegawai/layout/wrapper',$data,$this->data);
			}
		}else{
			redirect('auth');
		}
	}

	function getlevelkesulitan() {
		$data = $this->lb->getlevelkesulitan_model();
    	// var_dump($data->result_array());exit();
		return $data->result_array();
	}

	function getlogbook(){
		$key = $this->session->userdata('KODE');
		$this->result = $this->lb->getlogbook_model($key);
		$data = $this->result->result_array();
		return $data;
	}

	function addlogbook() {
		// var_dump($_POST['tanggal_awal']);exit();
		$data = array('TLB_TANGGAL' => $_POST['tanggal_awal'],
			'MST_PEGAWAI_MPG_KODE' => $_POST['kode_pegawai'],
			'TLB_NAMA_PEGAWAI' => $_POST['nama_pegawai'],
			'MST_UNIT_MSU_KODE' => $_POST['kode_unit'],
			'MST_KEG_LOGB_MKL_KODE' => $_POST['kode_kegiatan'],
			'TLB_NAMA_KEGIATAN' => $_POST['nama_kegiatan'],
			'TLB_KETERANGAN_KEGIATAN' => $_POST['keterangan_logbook'],
			'TLB_TANGGAL_AKHIR' => $_POST['tanggal_ahir'],
			'TLB_QTY' => '1',
			'TLB_SOURCE_DATA' => '2',
			'TLB_OUTPUT' => $_POST['output_logbook'],
			'REF_LVL_KESLTN_RLK_KODE' => $_POST['level_kesulitan'],
		);
		$request = $this->lb->savelogbook_model($data);

		$result['status'] = 'success';
		$result['message'] = 'Data berhasil diinputkan';
		$result['redirect_url'] = site_url('pegawai/logbook/');
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($result));
		$string = $this->output->get_output();
		echo json_encode($result);
		exit();
	}

	function updatelogbook() {
		$data = array('TLB_ID' => $_POST['tlb_id'],
			'TLB_TANGGAL' => $_POST['tanggal_awal'],
			'MST_PEGAWAI_MPG_KODE' => $_POST['kode_pegawai'],
			'TLB_NAMA_PEGAWAI' => $_POST['nama_pegawai'],
			'MST_UNIT_MSU_KODE' => $_POST['kode_unit'],
			'MST_KEG_LOGB_MKL_KODE' => $_POST['kode_kegiatan'],
			'TLB_NAMA_KEGIATAN' => $_POST['nama_kegiatan'],
			'TLB_KETERANGAN_KEGIATAN' => $_POST['keterangan_logbook'],
			'TLB_TANGGAL_AKHIR' => $_POST['tanggal_ahir'],
			'TLB_QTY' => '1',
			'TLB_SOURCE_DATA' => '2',
			'TLB_OUTPUT' => $_POST['output_logbook'],
			'REF_LVL_KESLTN_RLK_KODE' => $_POST['level_kesulitan'],
		);

		if ($data['TLB_TANGGAL']=="") {
			$result['pesan']="Tanggal awal harus diisi";
		}elseif($data['MST_KEG_LOGB_MKL_KODE']==""){
			$result['pesan']="Logbook harus diisi";
		}elseif($data['TLB_KETERANGAN_KEGIATAN']==""){
			$result['pesan']="Keterangan harus diisi";
		}elseif(is_int($data['TLB_KETERANGAN_KEGIATAN']) == true){
			$result['pesan']="Keterangan tidak boleh berupa angka";
		}elseif($data['TLB_TANGGAL_AKHIR']==""){
			$result['pesan']="Tanggal ahir harus diisi";
		}elseif($data['TLB_OUTPUT']==""){
			$result['pesan']="Output harus diisi";
		}elseif($data['REF_LVL_KESLTN_RLK_KODE']==""){
			$result['pesan']="Level kesulitan harus diisi";
		}else{
			$result['pesan']="";
			$request = $this->lb->updatelogbook_model($data);
			// var_dump($request);exit();
		}

		$result['status'] = 'success';
		$result['message'] = 'Data berhasil diubah';
		$result['redirect_url'] = site_url('pegawai/logbook/');
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($result));
		$string = $this->output->get_output();
		echo json_encode($result);
		exit();

	}

	public function deletelogbook($id) {
		if(empty($id)){
			redirect('pegawai/logbook');
		}else{
			try
			{
				$request = $this->lb->deletelogbook_model($id);
			}catch( Exception $e){			
			}
			redirect('pegawai/logbook');
		}
	}
}

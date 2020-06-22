<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masteriki extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Masteriki_model','mim');
	}

	public function index() {
		if ($this->session->userdata('KODE') != NULL) {
			$data = array (	'title'		=>'Master Indeks Kinerja',
				'isi'		=>'admin/listiki'
			);
			$this->data['masteriki'] = $this->getmasteriki();
			$this->data['units'] = $this->getunit();
			$this->data['jabatans'] = $this->getjabatan();
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

	function getmasteriki(){
		$key = $this->session->userdata('MSU_KODE');
		$this->result = $this->mim->getmasteriki_model($key);
		$data = $this->result->result_array();
		// var_dump($data);exit();
		return $data;
	}

	function getjabatan() {
		$data = $this->mim->getjabatan_model();
		return $data;
	}

	function getunit() {
		$data = $this->mim->getunit_model();
		return $data;
	}

	function getmasterikibyid() {
    	$id 	= $this->input->post('id');
    	$request= $this->mim->getmasterikibyid_model($id);
    	// var_dump($request);exit();
    	echo json_encode($request);
	}
	function cekPresentase($data,$unitdanjabatan){
		$request = $this->mim->cekPresentase_model($data,$unitdanjabatan);
		return $request;
	}
	function addmasteriki() {
		$data = array('MST_IKI_INDIKATOR' => $_POST['indikator'],
					'MST_IKI_DEFINISI' => $_POST['definisi'],
					'MST_IKI_TARGET' => $_POST['target'],
					'MST_IKI_BOBOT' => $_POST['bobot'],
					'MST_IKI_KATEGORI' => $_POST['kategori']
				);
		$unitdanjabatan = array('MSU_KODE' => $_POST['mstunit2'],
								'REF_JB_FN_KODE' => $_POST['mstjabatan2']
							);
		$cekPresentase = $this->cekPresentase($data,$unitdanjabatan);
		if ($data['MST_IKI_KATEGORI'] == 'kualitas' && $cekPresentase+$data['MST_IKI_BOBOT'] > 20) {
			$result['status'] = 'error';
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}elseif ($data['MST_IKI_KATEGORI'] == 'perilaku' && $cekPresentase+$data['MST_IKI_BOBOT'] > 30){
			$result['status'] = 'error';
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}elseif ($data['MST_IKI_KATEGORI'] == 'kuantitas' && $cekPresentase+$data['MST_IKI_BOBOT'] > 50){
			$result['status'] = 'error';
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}else{
			if ($_POST['mstjabatan2'] == '') {
				$def = array('MSU_KODE' => $_POST['mstunit2'],
					'REF_JB_FN_KODE'=> NULL
				);
			}else{
				$def = array('MSU_KODE' => $_POST['mstunit2'],
					'REF_JB_FN_KODE'=>$_POST['mstjabatan2']
				);
			}
			$request = $this->mim->savemasteriki_model($data);
			if ($request) {
				$maxkode = $this->mim->getmaxkodeiki_model();
				$savedef = $this->mim->savedef_model($maxkode['MST_IKI_KODE'],$def);

				$result['status'] = 'success';
				$result['message'] = 'Data berhasil diinputkan';
				$result['redirect_url'] = site_url('masteriki/');
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($result));
				$string = $this->output->get_output();
				echo json_encode($result);
				exit();
			}else{
				$result['status'] = 'failed';
				$result['message'] = 'Lengkapi semua form!';
			}
		}
	}

	function updatemasteriki(){
		$data = array('MST_IKI_KODE' => $_POST['idiki'],
			'MST_IKI_INDIKATOR' => $_POST['indikator'],
			'MST_IKI_DEFINISI' => $_POST['definisi'],
			'MST_IKI_TARGET' => $_POST['target'],
			'MST_IKI_BOBOT' => $_POST['bobot'],
			'MST_IKI_KATEGORI' => $_POST['kategori']
		);
		$bobot_lama = $_POST['bobot_lama'];
		$unitdanjabatan = array('MSU_KODE' => $_POST['mstunit2'],
			'REF_JB_FN_KODE' => $_POST['mstjabatan2']
		);
		$cekPresentase = $this->cekPresentase($data,$unitdanjabatan);
		// var_dump(($cekPresentase-$bobot_lama)+$data['MST_IKI_BOBOT']);exit();
		if ($data['MST_IKI_KATEGORI'] == 'kualitas' && ($cekPresentase-$bobot_lama)+$data['MST_IKI_BOBOT'] > 20) {
			$result['status'] = 'error';
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}elseif ($data['MST_IKI_KATEGORI'] == 'perilaku' && ($cekPresentase-$bobot_lama)+$data['MST_IKI_BOBOT'] > 30){
			$result['status'] = 'error';
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}elseif ($data['MST_IKI_KATEGORI'] == 'kuantitas' && ($cekPresentase-$bobot_lama)+$data['MST_IKI_BOBOT'] > 50){
			$result['status'] = 'error';
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}else{

			if ($_POST['mstjabatan2'] == '') {
				$def = array('MSU_KODE' => $_POST['mstunit2'],
					'REF_JB_FN_KODE'=> NULL
				);
			}else{
				$def = array('MSU_KODE' => $_POST['mstunit2'],
					'REF_JB_FN_KODE'=>$_POST['mstjabatan2']
				);
			}
		// var_dump($data);exit();
			if ($data != null) {
				$request = $this->mim->updatemasteriki_model($data,$def);

				$result['status'] = 'success';
				$result['message'] = 'Data berhasil diubah';
				$result['redirect_url'] = site_url('masteriki/');
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode($result));
				$string = $this->output->get_output();
				echo json_encode($result);
				exit();
			}
		}
	}

	public function deletemasteriki($id) {
		if(empty($id)){
			redirect('masteriki/');
		}else{
			try
			{
				$request = $this->mim->deletemasteriki_model($id);
			}catch( Exception $e){			
			}
			redirect('masteriki/');
		}
	}
}
?>
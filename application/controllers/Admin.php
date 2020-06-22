<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('admin_model','am');
		$this->load->model('Scoring_model','sm');
	}
	public function index() {
		if ($this->session->userdata('KODE') != NULL) {
			$this->session->unset_userdata('iden_kode');
			$this->session->unset_userdata('iden_nama');
			$this->session->unset_userdata('iden_nip');
			$this->session->unset_userdata('iden_foto');
			$this->session->unset_userdata('iden_alamat');
			$this->session->unset_userdata('iden_jk');
			$this->session->unset_userdata('iden_telp');
			$this->session->unset_userdata('iden_email');
			$this->session->unset_userdata('iden_agama');
			$this->session->unset_userdata('iden_msu_kode');
			$this->session->unset_userdata('iden_msu_nama');
			$this->session->unset_userdata('iden_jabatan');
			$data = array (	'title'		=>'Data Pegawai',
				'isi'		=>'admin/list'
			);
			$this->data['agama'] = $this->getagama();
			$this->data['jabatan'] = $this->getjabatan();
			$this->data['unit'] = $this->getunit();
			$this->data['pegawai'] = $this->getpegawai();
			$this->data['belumdinilai'] = $this->notifUnscored();
			$this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
		}else{
			redirect('auth');
		}
		
	}
	function getagama() {
		$data = $this->am->getagama_model();
		return $data;
	}
	function getjabatan() {
		$data = $this->am->getjabatan_model();
		return $data;
	}
	function getunit() {
		$data = $this->am->getunit_model();
		return $data;
	}
	function getmaxkode() {
		$request = $this->am->getmaxkode_model();
		$data = $request[0]['MPG_KODE'];
		return $data;
	}
	function getmaxnip() {
		$unit = $this->session->userdata('MSU_KODE');
		$request = $this->am->getmaxnip_model($unit);
		$data = $request[0]['MPG_NIP'];
		return $data;
	}
	function getpegawai() {
		$unit = $this->session->userdata('MSU_KODE');
		$data = $this->am->getpegawai_model($unit);
		return $data;
	}
	function getpegawaibyid() {
		$unit 	= $this->session->userdata('MSU_KODE');
    	$id 	= $this->input->post('id');
    	$request= $this->am->getpegawaibyid_model($unit,$id);
    	echo json_encode($request);
	}
	function addpegawai() {

		$niptertinggi = $this->getmaxnip();
		$kodetertinggi = $this->getmaxkode();
		$nextnip = substr($niptertinggi, 10)+1;
		$nip = '0'.$_POST['unit'].date('Ymd').$nextnip;
		$kode = $kodetertinggi+1;
		$handkey = substr($_POST['namapegawai'],0,3).date('d');
		$data = array('MPG_KODE'=>$kode,
					'MPG_HANDKEY' => $handkey,
					'MPG_NAMA' => $_POST['namapegawai'],
					'MPG_NIP' => $nip,
					'MPG_ALAMAT' => $_POST['alamatpegawai'],
					'MPG_JK' => $_POST['jeniskelamin'],
					'MPG_NO_TELP' => $_POST['nomertelepon'],
					'MPG_EMAIL' => $_POST['email'],
					'MPG_ISAKTIF' => '1',
					'REF_AGAMA_RAG_KODE' => $_POST['agama'],
					'MPG_IS_VERIF' => '1',
					'MPG_TMPT_LAHIR' => $_POST['tempatlahir'],
					'MPG_TGL_LAHIR' => $_POST['tanggallahir'],
					'REF_JAB_KODE' => $_POST['jabatan'],
					'MST_PEG_KODE' => $kode,
					'MST_PEGAWAI_MPG_KODE' => $kode,
					'MST_UNIT_MSU_KODE' => $_POST['unit'],
		 );
		if(!empty($_FILES['foto']['name']))
        {
            $upload = $this->_do_upload();
            $data['MPG_FOTO'] = $upload;
        }

        $request = $this->am->savepegawai_model($data);
		$result['status'] = 'success';
		$result['message'] = 'Data berhasil diinputkan';
		$result['redirect_url'] = site_url('admin/');
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($result));
		$string = $this->output->get_output();
		echo json_encode($result);
		exit();
	}
	private function _do_upload()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 100; 
        $config['max_width']            = 1000; 
        $config['max_height']           = 1000; 
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')) 
        {
            $data['inputerror'][] = 'foto';
            $data['error_string'][] = 'Ukuran file lebih dari 100 kb atau format file selain (jpg/png/jpeg)'; 
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    function deletepegawai($id){
    	if(empty($id)){
			redirect('admin/');
		}else{
			try
			{
				$unit 	= $this->session->userdata('MSU_KODE');
				$pegawai = $this->am->getpegawaibyid_model($unit,$id);
				if(file_exists('./assets/img/'.$pegawai[0]['MPG_FOTO']) && $pegawai[0]['MPG_FOTO'])
					unlink('./assets/img/'.$pegawai[0]['MPG_FOTO']);
				$request = $this->am->deletepegawai_model($id);
			}catch( Exception $e){			
			}
			redirect('admin/');
		}
    }
	function updatepegawai() {
		$data = array('MPG_KODE'=> $_POST['idpegawai'],
					'MPG_NAMA' => $_POST['namapegawai'],
					'MPG_ALAMAT' => $_POST['alamatpegawai'],
					'MPG_JK' => $_POST['jeniskelamin'],
					'MPG_NO_TELP' => $_POST['nomertelepon'],
					'MPG_EMAIL' => $_POST['email'],
					'MPG_ISAKTIF' => '1',
					'REF_AGAMA_RAG_KODE' => $_POST['agama'],
					'MPG_IS_VERIF' => '1',
					'MPG_TMPT_LAHIR' => $_POST['tempatlahir'],
					'MPG_TGL_LAHIR' => $_POST['tanggallahir'],
					'REF_JAB_KODE' => $_POST['jabatan'],
					'MST_PEG_KODE' => $_POST['idpegawai'],
					'MST_PEGAWAI_MPG_KODE' => $_POST['idpegawai'],
					'MST_UNIT_MSU_KODE' => $_POST['unit'],
		 );
		if($this->input->post('hapusfoto')) // if remove photo checked
        {
            if(file_exists('./assets/img/'.$this->input->post('hapusfoto')) && $this->input->post('hapusfoto'))
                unlink('./assets/img/'.$this->input->post('hapusfoto'));
            $data['MPG_FOTO']='';
        }
        if(!empty($_FILES['foto']['name']))
        {
            $upload = $this->_do_upload();
            $unit 	= $this->session->userdata('MSU_KODE');
            $pegawai = $this->am->getpegawaibyid_model($unit,$this->input->post('idpegawai'));
            if(file_exists('./assets/img/'.$pegawai[0]['MPG_FOTO']) && $pegawai[0]['MPG_FOTO'])
            	unlink('./assets/img/'.$pegawai[0]['MPG_FOTO']);
            $data['MPG_FOTO']=$upload;
        }
        $this->am->updatepegawai_model(array('MPG_KODE' => $this->input->post('idpegawai')), $data);
        $result['status'] = 'success';
		$result['message'] = 'Data berhasil diinputkan';
		$result['redirect_url'] = site_url('admin/');
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($result));
		$string = $this->output->get_output();
		echo json_encode($result);
		exit();
	}
	// public function chartpegawai() {
	// 	$data = array (	'title'		=>'Tambah Pegawai',
	// 					'isi'		=>'admin/chartpegawai'
	// 					);
	// 	$this->load->view('admin/layout/special',$data, FALSE);
	// }
	public function ikipegawai() {
		$data = array (	'title'		=>'Tambah Pegawai',
						'isi'		=>'admin/ikipegawai'
						);
		$this->load->view('admin/layout/special',$data, FALSE);
	}
	public function logbookpegawai($id=null) {
		if ($this->session->userdata('KODE') != NULL) {
			if ($id != null) {
				$data = array (	'title'		=>'Logbook Pegawai',
					'isi'		=>'admin/logbookpegawai'
				);
				$this->data['iden'] = $this->getidenpegawai($id);
				$this->data['logbook'] = $this->getlogbookbyidpegawai($id);
				$this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
			}else{
				redirect('admin');
			}
		}else{
			redirect('auth');
		}
	}
	function getlogbookbyidpegawai(){
		date_default_timezone_set('Asia/Jakarta');
		$id = $this->session->userdata('iden_kode');
    	$date = array(
    		'datestart' => date("Y-m-d 00:00:00"),
    		'dateend' 	=> date("Y-m-d 23:59:59")
    	);
    	$request = $this->am->getlogbookbyidpegawai_model($id,$date);
    	return $request;
	}
	function getidenpegawai($kode) {
		$unit 	= $this->session->userdata('MSU_KODE');
    	$id 	= $kode;
    	$request= $this->am->getpegawaibyid_model($unit,$id);
    	if ($request) {
    		$this->session->set_userdata('iden_kode',$request[0]['MPG_KODE']);
    		$this->session->set_userdata('iden_nama',$request[0]['MPG_NAMA']);
    		$this->session->set_userdata('iden_nip',$request[0]['MPG_NIP']);
    		$this->session->set_userdata('iden_foto',$request[0]['MPG_FOTO']);
    		$this->session->set_userdata('iden_alamat',$request[0]['MPG_ALAMAT']);
    		$this->session->set_userdata('iden_jk',$request[0]['MPG_JK']);
    		$this->session->set_userdata('iden_telp',$request[0]['MPG_NO_TELP']);
    		$this->session->set_userdata('iden_email',$request[0]['MPG_EMAIL']);
    		$this->session->set_userdata('iden_agama',$request[0]['REF_AGAMA_NAMA']);
    		$this->session->set_userdata('iden_msu_kode',$request[0]['MSU_KODE']);
    		$this->session->set_userdata('iden_msu_nama',$request[0]['MSU_NAMA']);
    		$this->session->set_userdata('iden_jabatan',$request[0]['REF_JB_FN_NAMA']);
    	}
    }
    function check(){
    	$data = array('id' => $this->input->post('id[]'),
    					'veriv' => $this->input->post('veriv[]')
    				);
    	$request = $this->am->check_model($data);
    	if ($request) {
    		$result['status'] = 'success';
			$result['message'] = 'Data berhasil diinputkan';
			$result['redirect_url'] = site_url('admin/logbooksortdate');
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
    	}
    }
    function logbooksortdate(){
    	if ($this->session->userdata('KODE') != NULL) {
    		$data = array (	'title'		=>'Logbook',
    			'isi'		=>'admin/logbookpegawai'
    		);
    		$jamawal = $this->input->post('datestart');
    		$jamahir = $this->input->post('dateend');
    		$kode = $this->session->userdata('iden_kode');
    		$datapost= array (
    			'datestart' => $jamawal.' 00:00:00',
    			'dateend' 	=> $jamahir.' 23:59:59');
    		if ($datapost == null) {
    			redirect('admin/logbookpegawai/'.$kode);
    		}else{
    			try
    			{
    				$request = $this->am->getlogbookdatesorting_model($kode,$datapost);
    				$this->data['logbook'] = $request->result_array();
    				$this->data['iden'] = $this->getidenpegawai($kode);
    			}catch( Exception $e){			
    			}
    			$this->load->view('admin/layout/wrapper',$data,$this->data);
    		}
    	}else{
    		redirect('auth');
    	}
    	
    }
    function notifUnscored(){
    	$unit = $this->session->userdata('MSU_KODE');
    	$now = date('m');
		$request = $this->sm->notifUnscored_model($unit,$now);
		return $request;
    }
}
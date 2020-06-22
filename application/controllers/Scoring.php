<?php 

/**
 * 
 */
class Scoring extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Scoring_model','sm');
	}

	public function page($id=null) {
		if ($this->session->userdata('KODE') != NULL) {
			if ($id != null) {
				$data = array (	'title'		=>'Penilaian Pegawai',
					'isi'		=>'admin/scoring'
				);
				$this->data['identitas'] = $this->getEachPegawai($id);
				$this->data['kualitas'] = $this->getItemPenilaianKualitas();
				$this->data['perilaku'] = $this->getItemPenilaianPerilaku();
				$this->data['cek'] = $this->cekTanggalPenilaian();
				$this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
			}else{
				redirect('admin');
			}
		}else{
			redirect('auth');
		}
	}
	function getEachPegawai($kode){
		$unit 	= $this->session->userdata('MSU_KODE');
    	$MPG_KODE 	= $kode;
    	$request= $this->sm->getEachPegawai_model($unit,$MPG_KODE);
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
    		$this->session->set_userdata('iden_jabatan_kode',$request[0]['REF_JB_FN_KODE']);
    	}
	}
	function getItemPenilaianKualitas(){
		$unit = $this->session->userdata('iden_msu_kode');
		$jabatan = $this->session->userdata('iden_jabatan_kode');
		$request = $this->sm->getItemPenilaianKualitas_model($unit,$jabatan);
		return $request;
	}
	function getItemPenilaianPerilaku(){
		$unit = $this->session->userdata('iden_msu_kode');
		$jabatan = $this->session->userdata('iden_jabatan_kode');
		$request = $this->sm->getItemPenilaianPerilaku_model($unit,$jabatan);
		return $request;
	}
	function inputNilai(){
		// var_dump($_POST);exit();
		$data = array('MPG_KODE' => $_POST['idpegawai'],
					'MSU_KODE' => $this->session->userdata('MSU_KODE'),
					'IDPERILAKU' => $_POST['idperilaku'],
					'PERILAKU' => $_POST['perilaku'],
					'IDKUALITAS' => $_POST['idkualitas'],
					'KUALITAS' => $_POST['kualitas'],
					);
		// var_dump($data);exit();
		$request = $this->sm->inputNilai_model($data);

		if ($request) {
			$result['status'] = 'success';
			$result['message'] = 'Data berhasil diinputkan';
			$result['redirect_url'] = site_url('scoring/page/');
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($result));
			$string = $this->output->get_output();
			echo json_encode($result);
			exit();
		}
	}
	function cekTanggalPenilaian(){
		$kode = $this->session->userdata('iden_kode');
		$now = date('m');
		$request = $this->sm->cekTanggalPenilaian_model($kode,$now);
		if ($request != null) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

}
 ?>
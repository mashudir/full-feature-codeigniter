<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*class ini digunakan untuk memperoleh nilai indeks kinerja yang akan ditampilkan pada halama iki maupun iki pegawai pada admin page
*
*/
class Ikipegawai extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Iki_model','im');
		$this->load->model('Admin_model','am');
	}

	public function page($kode){
        if ($this->session->userdata('KODE') != NULL) {
            $data = array (	'title'		=>'Index Kinerja Individu',
                  'isi'		=>'admin/ikipegawai'
            );
            $KODE = $kode;
            $BULAN = date('Y-m');
            $this->data['iden'] = $this->getidenpegawai($KODE);
            $this->data['kuantitas'] = $this->parsingKuantitas($KATEGORI="kuantitas",$KODE,$BULAN);
            $this->data['kualitas'] = $this->getNilaiIki($KATEGORI="kualitas",$KODE,$BULAN);
            $this->data['perilaku'] = $this->getNilaiIki($KATEGORI="perilaku",$KODE,$BULAN);
        // var_dump($this->data['perilaku']);exit();
            $this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
        }else{
            redirect('auth');
        }
    }
    public function sortByMonth(){
        if ($this->session->userdata('KODE') != NULL) {
            $filter = $this->input->post('month');
            $data = array ( 'title'     =>'Index Kinerja Individu',
                            'isi'       =>'admin/ikipegawai'
                        );
            $KODE = $this->session->userdata('iden_kode');
            $BULAN = $filter;
            $this->data['iden'] = $this->getidenpegawai($KODE);
            $this->data['kuantitas'] = $this->parsingKuantitas($KATEGORI="kuantitas",$KODE,$BULAN);
            $this->data['kualitas'] = $this->getNilaiIki($KATEGORI="kualitas",$KODE,$BULAN);
            $this->data['perilaku'] = $this->getNilaiIki($KATEGORI="perilaku",$KODE,$BULAN);
            $this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
        }else{
            redirect('auth');
        }
    }
    function getidenpegawai($kode) {
        $unit 	= $this->session->userdata('MSU_KODE');
        $id 	= $kode;
        $request= $this->am->getpegawaibyid_model($unit,$id);
    	// var_dump($request);exit();
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
    public function getNilaiIki($KATEGORI,$KODE,$BULAN) {
        $data = $this->im->getiki_model($KATEGORI,$KODE,$BULAN);
        return $data->result_array();
    }
    public function getNilaiLogbook($BULAN){
        $KODE = $this->session->userdata('iden_kode');
        // var_dump($KODE);exit();
        $data = $this->im->getNilaiLogbook_model($BULAN,$KODE);
        return $data->result_array();
    }
    public function parsingKuantitas($KATEGORI,$KODE,$BULAN){
        $IKI = $this->im->getIkiKuantitas_model($KATEGORI,$KODE,$BULAN);
        $NILAI = $this->getNilaiLogbook($BULAN);
        $total =array('total_kuantitas' => ($IKI[0]['MST_IKI_BOBOT']/$IKI[0]['MST_IKI_TARGET'])*$NILAI[0]['SCORE']);
        // var_dump($total_kuantitas);exit();
        $data = array_merge($IKI[0],$NILAI[0],$total);
        // var_dump($data);exit();
        return $data;
    }
}
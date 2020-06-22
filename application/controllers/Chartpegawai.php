<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*class ini digunakan untuk memperoleh nilai indeks kinerja yang akan ditampilkan pada halama iki maupun iki pegawai pada admin page
*
*/
class Chartpegawai extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Chart_model','cm');
		$this->load->model('Admin_model','am');
	}

    function index(){
        if ($this->session->userdata('KODE') != NULL) {
            $data = array ( 'title'     =>'Chart All Pegawai',
              'isi'     =>'admin/chartallpegawai'
                        );
            $UNIT = $this->session->userdata('MSU_KODE');
            $BULAN = date('Y-m');

            $LB[]= "";
            $KL[]= "";
            $PE[]= "";
            foreach ($this->nilaiLogbookAll() as $key) {
                $LB[] = $key;
            }
            foreach ($this->nilaiIKIAll($KATEGORI="kualitas",$UNIT,$BULAN) as $key) {
                $KL[] = $key;
            }
            foreach ($this->nilaiIKIAll($KATEGORI="perilaku",$UNIT,$BULAN) as $key) {
                $PE[] = $key;
            }
            // $this->data['y'] = date('F/Y');
            $this->data['lb'] = $LB;
            // var_dump($this->data['lb']);exit();
            $this->data['kual'] = $KL;
            // var_dump($this->data['kual']);exit();
            $this->data['peri'] = $PE;
            // var_dump($this->data['peri']);exit();

            $this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
        }else{
            redirect('auth');
        }
    }
    public function sortByMonthAll(){
        if ($this->session->userdata('KODE') != NULL) {
            $filter = $this->input->post('month');
            $data = array ( 'title'     =>'Chart All Pegawai',
                'isi'       =>'admin/chartallpegawai'
            );
            $UNIT = $this->session->userdata('MSU_KODE');
            $BULAN = $filter;
            
            $LB[]= "";
            $KL[]= "";
            $PE[]= "";
            foreach ($this->nilaiLogbookAll($BULAN) as $key) {
                $LB[] = $key;
            }
            foreach ($this->nilaiIKIAll($KATEGORI="kualitas",$UNIT,$BULAN) as $key) {
                $KL[] = $key;
            }
            foreach ($this->nilaiIKIAll($KATEGORI="perilaku",$UNIT,$BULAN) as $key) {
                $PE[] = $key;
            }
            if ($LB == "") {
                $this->data['lb'] = 0;
            }else{
                $this->data['lb'] = $LB; 
            }
            if ($KL == "") {
                $this->data['kual'] = 0;
            }else{
                $this->data['kual'] = $KL; 
            }
            if ($PE == "") {
                $this->data['peri'] = 0;
            }else{
                $this->data['peri'] = $PE; 
            }
            
            $this->data['y'] = date('F/Y',strtotime($BULAN));
        // var_dump($this->data['b']);exit();
            $this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
        }else{
            redirect('auth');
        }
    }

	public function page($kode){
        if ($this->session->userdata('KODE') != NULL) {
            $data = array (	'title'		=>'Chart Pegawai',
              'isi'		=>'admin/chartpegawai'
                        );
            $KODE = $kode;
            $BULAN = date('Y-m');
            $this->data['iden'] = $this->getidenpegawai($KODE);

            $LB[]= "";
            $KL[]= "";
            $PE[]= "";
            foreach ($this->nilaiLogbook() as $key) {
                $LB[] = $key;
            }
            foreach ($this->nilaiIKI($KATEGORI="kualitas",$KODE,$BULAN) as $key) {
                $KL[] = $key;
            }
            foreach ($this->nilaiIKI($KATEGORI="perilaku",$KODE,$BULAN) as $key) {
                $PE[] = $key;
            }
            $this->data['y'] = date('F/Y');
            $this->data['lb'] = $LB;
            $this->data['kual'] = $KL;
            $this->data['peri'] = $PE;

            $this->load->view('admin/layout/wrapper',$data,$this->data, FALSE);
        }else{
            redirect('auth');
        }
    }
    public function sortByMonth(){
        if ($this->session->userdata('KODE') != NULL) {
            $filter = $this->input->post('month');
            $data = array ( 'title'     =>'Chart Pegawai',
                'isi'       =>'admin/chartpegawai'
            );
            $KODE = $this->session->userdata('iden_kode');
            $BULAN = $filter;
        // var_dump($BULAN);exit();
            $this->data['iden'] = $this->getidenpegawai($KODE);
            $LB[]= "";
            $KL[]= "";
            $PE[]= "";
            foreach ($this->nilaiLogbook($BULAN) as $key) {
                $LB[] = $key;
            }
            foreach ($this->nilaiIKI($KATEGORI="kualitas",$KODE,$BULAN) as $key) {
                $KL[] = $key;
            }
            foreach ($this->nilaiIKI($KATEGORI="perilaku",$KODE,$BULAN) as $key) {
                $PE[] = $key;
            }
            if ($LB == "") {
                $this->data['lb'] = 0;
            }else{
                $this->data['lb'] = $LB; 
            }
            if ($KL == "") {
                $this->data['kual'] = 0;
            }else{
                $this->data['kual'] = $KL; 
            }
            if ($PE == "") {
                $this->data['peri'] = 0;
            }else{
                $this->data['peri'] = $PE; 
            }
            
            $this->data['y'] = date('F/Y',strtotime($BULAN));
        // var_dump($this->data['b']);exit();
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
	// public function getNilaiIki($KATEGORI,$KODE,$BULAN){
 //        $data = $this->cm->getiki_model($KATEGORI,$KODE,$BULAN);
 //        // var_dump($data->result_array());exit();
 //        return $data->result_array();
 //    }
    // public function getNilaiLogbook($BULAN){
    //     $KODE = $this->session->userdata('iden_kode');
    //     // var_dump($KODE);exit();
    //     $data = $this->cm->getNilaiLogbook_model($BULAN,$KODE);
    //     // var_dump($data->result_array());exit();
    //     return $data->result_array();
    // }
    public function nilaiLogbook($params=null){
        $KODE = $this->session->userdata('iden_kode');
        date_default_timezone_set('Asia/Jakarta');
        if (!isset($params)) {
            $FILTER = date("Y-m");
        }else{
            $FILTER = $params;
        }
        // var_dump($FILTER);exit();
        $data = $this->cm->nilaiLogbook_model($KODE,$FILTER);
        return $data->result_array();
    }
    public function nilaiIKI($KATEGORI,$KODE,$BULAN){
        $data = $this->cm->nilaiIKI_model($KATEGORI,$KODE,$BULAN);
        // var_dump($data->result_array());exit();
        return $data->result_array();
    }

    public function nilaiLogbookAll($params=null){
        $UNIT = $this->session->userdata('MSU_KODE');
        date_default_timezone_set('Asia/Jakarta');
        if (!isset($params)) {
            $FILTER = date("Y-m");
        }else{
            $FILTER = $params;
        }
        // var_dump($FILTER);exit();
        $data = $this->cm->nilaiLogbookAll_model($UNIT,$FILTER);
        return $data->result_array();
    }
    public function nilaiIKIAll($KATEGORI,$UNIT,$BULAN){
        $data = $this->cm->nilaiIKIAll_model($KATEGORI,$UNIT,$BULAN);
        // var_dump($data->result_array());exit();
        return $data->result_array();
    }
    // public function parsingKuantitas($KATEGORI,$KODE,$BULAN){
    //     $IKI = $this->cm->getIkiKuantitas_model($KATEGORI,$KODE,$BULAN);
    //     $NILAI = $this->getNilaiLogbook($BULAN);
    //     $total =array('total_kuantitas' => ($IKI[0]['MST_IKI_BOBOT']/$IKI[0]['MST_IKI_TARGET'])*$NILAI[0]['SCORE']);
    //     // var_dump($total_kuantitas);exit();
    //     $data = array_merge($IKI[0],$NILAI[0],$total);
    //     // var_dump($data);exit();
    //     return $data;
    // }
}
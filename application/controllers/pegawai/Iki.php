<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*class ini digunakan untuk memperoleh nilai indeks kinerja yang akan ditampilkan pada halama iki maupun iki pegawai pada admin page
*
*/
class Iki extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Iki_model','im');
	}

	public function index(){
        if ($this->session->userdata('KODE') != NULL) {
            $data = array (	'title'		=>'Index Kinerja Individu',
                            'isi'		=>'pegawai/iki/list'
            );
            $KODE = $this->session->userdata('KODE');
            $BULAN = date('Y-m');
            $this->data['kuantitas'] = $this->parsingKuantitas($KATEGORI="kuantitas",$KODE,$BULAN);
            $this->data['kualitas'] = $this->getNilaiIki($KATEGORI="kualitas",$KODE,$BULAN);
            $this->data['perilaku'] = $this->getNilaiIki($KATEGORI="perilaku",$KODE,$BULAN);
            $this->load->view('pegawai/layout/wrapper',$data,$this->data, FALSE);
        }else{
            redirect('auth');
        }
    }
    public function sortByMonth(){
        if ($this->session->userdata('KODE') != NULL) {
            $filter = $this->input->post('month');
            $data = array ( 'title'     =>'Index Kinerja Individu',
                'isi'       =>'pegawai/iki/list'
            );
            $KODE = $this->session->userdata('KODE');
            $BULAN = $filter;
            $this->data['kuantitas'] = $this->parsingKuantitas($KATEGORI="kuantitas",$KODE,$BULAN);
            $this->data['kualitas'] = $this->getNilaiIki($KATEGORI="kualitas",$KODE,$BULAN);
            $this->data['perilaku'] = $this->getNilaiIki($KATEGORI="perilaku",$KODE,$BULAN);
            $this->load->view('pegawai/layout/wrapper',$data,$this->data, FALSE);
        }else{
            redirect('auth');
        }
    }
	public function getNilaiIki($KATEGORI,$KODE,$BULAN) {
        $data = $this->im->getiki_model($KATEGORI,$KODE,$BULAN);
        return $data->result_array();
    }
    public function getNilaiLogbook($BULAN){
        $KODE = $this->session->userdata('KODE');
        $data = $this->im->getNilaiLogbook_model($BULAN,$KODE);
        return $data->result_array();
    }
    public function parsingKuantitas($KATEGORI,$KODE,$BULAN){
        $IKI = $this->im->getIkiKuantitas_model($KATEGORI,$KODE,$BULAN);
        $NILAI = $this->getNilaiLogbook($BULAN);
        $data = array_merge($IKI[0],$NILAI[0]);
        return $data;
    }
}

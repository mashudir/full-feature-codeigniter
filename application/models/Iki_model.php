<?php 
/**
 * 
 */
class Iki_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getiki_model($KATEGORI,$MPG_KODE,$BULAN){
		$this->db->select('MI.*');
		$this->db->select('P.SCORE');
		$this->db->select('((MI.MST_IKI_BOBOT/MI.MST_IKI_TARGET)*P.SCORE) AS NILAI');
		$this->db->from('mst_iki MI');
		$this->db->join('def_unit_iki DUI','DUI.MST_IKI_KODE = MI.MST_IKI_KODE','RIGHT');
		$this->db->join('trans_unit_pegawai TUP','DUI.MST_UNIT_MSU_KODE = TUP.MST_UNIT_MSU_KODE OR DUI.MST_UNIT_MSU_KODE IS NULL');
		$this->db->join('penilaian P','P.IKI_KODE = MI.MST_IKI_KODE');
		$this->db->join('def_jabatan_iki DJI','DJI.MST_IKI_KODE = MI.MST_IKI_KODE');
		$this->db->join('trans_jabatan_pegawai TJP','DJI.REF_JAB_KODE = TJP.REF_JAB_KODE OR DJI.REF_JAB_KODE IS NULL');
		$this->db->where('TUP.MST_PEGAWAI_MPG_KODE',$MPG_KODE);
		$this->db->where('TJP.MST_PEG_KODE',$MPG_KODE);
		$this->db->where('P.MPG_KODE',$MPG_KODE);
		$this->db->where('MI.MST_IKI_KATEGORI',$KATEGORI);
		$this->db->where('SUBSTRING(P.TGL_PENILAIAN,1,7)',$BULAN);
		$this->db->group_by('MI.MST_IKI_KODE');
		$this->db->order_by("MI.MST_IKI_KATEGORI", "asc");
		$data = $this->db->get();
		return $data;
	}
	function getIkiKuantitas_model($KATEGORI,$MPG_KODE,$BULAN){
		$this->db->select('MI.*');
		$this->db->from('mst_iki MI');
		$this->db->join('def_unit_iki DUI','DUI.MST_IKI_KODE = MI.MST_IKI_KODE','RIGHT');
		$this->db->join('trans_unit_pegawai TUP','DUI.MST_UNIT_MSU_KODE = TUP.MST_UNIT_MSU_KODE OR DUI.MST_UNIT_MSU_KODE IS NULL');
		$this->db->join('def_jabatan_iki DJI','DJI.MST_IKI_KODE = MI.MST_IKI_KODE');
		$this->db->join('trans_jabatan_pegawai TJP','DJI.REF_JAB_KODE = TJP.REF_JAB_KODE OR DJI.REF_JAB_KODE IS NULL');
		$this->db->where('TUP.MST_PEGAWAI_MPG_KODE',$MPG_KODE);
		$this->db->where('TJP.MST_PEG_KODE',$MPG_KODE);
		$this->db->where('MI.MST_IKI_KATEGORI',$KATEGORI);
		$this->db->group_by('MI.MST_IKI_KODE');
		$this->db->order_by("MI.MST_IKI_KATEGORI", "asc");
		$data = $this->db->get()->result_array();
		return $data;
	}
	function getNilaiLogbook_model($BULAN = '',$KODE){
		$this->db->select("SUM(MKL.MKL_SCORE) AS SCORE");
		$this->db->from("mst_kegiatan_logbook MKL");
		$this->db->join('trans_logbook TLB','MKL.MKL_KODE = TLB.MST_KEG_LOGB_MKL_KODE');
		$this->db->where('TLB.TLB_IS_VERIF',1);
		$this->db->where('TLB.MST_PEGAWAI_MPG_KODE',$KODE);
		$this->db->where('SUBSTRING(TLB.TLB_TANGGAL,1,7)',$BULAN);
		$query = $this->db->get();
		return $query;
	}
}
 ?>
<?php 

/**
* 
*/
class Logbook_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		// $this->db->_protect_identifiers = false;
	}

	public function getkegiatan_model($MPG_KODE){
		$this->db->select('MKL.MKL_KODE');
		$this->db->select('MKL.MKL_NAMA');
		$this->db->select('MKL.MKL_KETERANGAN');
		$this->db->select('TUP.MST_UNIT_MSU_KODE');
		$this->db->select('TJP.MST_PEG_KODE');
		$this->db->select('TJP.REF_JAB_KODE');
		$this->db->select('TUP.MST_PEGAWAI_MPG_KODE');
		$this->db->from('mst_kegiatan_logbook MKL');
		$this->db->join('def_unit_logbook DUL','DUL.MKL_KODE = MKL.MKL_KODE','RIGHT');
		$this->db->join('trans_unit_pegawai TUP','DUL.MST_UNIT_MSU_KODE = TUP.MST_UNIT_MSU_KODE OR DUL.MST_UNIT_MSU_KODE IS NULL');
		$this->db->join('def_jabatan_logbook DJL','DJL.MKL_KODE = MKL.MKL_KODE');
		$this->db->join('trans_jabatan_pegawai TJP','DJL.REF_JAB_KODE = TJP.REF_JAB_KODE OR DJL.REF_JAB_KODE IS NULL');
		$this->db->where('TUP.MST_PEGAWAI_MPG_KODE',$MPG_KODE);
		$this->db->where('TJP.MST_PEG_KODE',$MPG_KODE);
		$this->db->where("MKL.MKL_ISAKTIF", '1', true);
		$this->db->group_by('MKL.MKL_KODE,MKL.MKL_NAMA,MKL.MKL_KETERANGAN,TUP.MST_UNIT_MSU_KODE');
		$this->db->order_by("MKL.MKL_NAMA", "asc");
		$data = $this->db->get();
		return $data;
	}

	public function getlevelkesulitan_model() {
		$this->db->select('*');
		$this->db->from('ref_level_kesulitan');
		$data = $this->db->get();
		return $data;
	}

	function savelogbook_model($data) {
		// $this->db->set('TLB_TANGGAL',"TO_DATE('".$tanggal['TLB_TANGGAL']."','DD/MM/YYYY HH24:MI:SS')",false);
		// $this->db->set('TLB_TANGGAL_AKHIR',"TO_DATE('".$tanggal['TLB_TANGGAL_AKHIR']."','DD/MM/YYYY HH24:MI:SS')",false);
		// unset($data['TLB_TANGGAL']);
		$query = $this->db->insert('trans_logbook',$data);
		return $query;
	}

	public function updatelogbook_model($data) {
		// $this->db->set('TLB_TANGGAL',"TO_DATE('".$tanggal['TLB_TANGGAL']."','DD/MM/YYYY HH24:MI:SS')",false);
		// $this->db->set('TLB_TANGGAL_AKHIR',"TO_DATE('".$tanggal['TLB_TANGGAL_AKHIR']."','DD/MM/YYYY HH24:MI:SS')",false);
		// $this->db->where($where);
		// $query = $this->db->update('trans_logbook',$data);
		// return $query;
		// var_dump($data);exit();
		$this->db->where('TLB_ID',$data['TLB_ID']);
		$query = $this->db->update('trans_logbook',$data);
		// var_dump($query);exit();
		return $query;

	}

	public function deletelogbook_model($delete) {
		$this->db->where('TLB_ID', $delete);
		$delete = $this->db->delete('trans_logbook');
	}

	public function getlogbook_model($key){
		$this->db->select('TLB.TLB_ID');
		$this->db->select('DATE_FORMAT(TLB.TLB_TANGGAL,"%d-%m-%Y") AS TLB_TANGGAL');
		$this->db->select('TLB.MST_PEGAWAI_MPG_KODE');
		$this->db->select('TLB.TLB_NAMA_PEGAWAI');
		$this->db->select('TLB.MST_UNIT_MSU_KODE');
		$this->db->select('TLB.MST_KEG_LOGB_MKL_KODE');
		$this->db->select('TLB.TLB_NAMA_KEGIATAN');
		$this->db->select('TLB.TLB_KETERANGAN_KEGIATAN');
		$this->db->select('DATE_FORMAT(TLB.TLB_TANGGAL_AKHIR,"%d-%m-%Y") AS TLB_TANGGAL_AKHIR');
		$this->db->select('TLB.TLB_QTY');
		$this->db->select('TLB.TLB_IS_VERIF');
		$this->db->select('TLB.TLB_SOURCE_DATA');
		$this->db->select('TLB.TLB_OUTPUT');
		$this->db->select('TLB.REF_LVL_KESLTN_RLK_KODE');
		$this->db->select('RLK.RLK_NAMA');
		$this->db->from('trans_logbook TLB');
		$this->db->join('ref_level_kesulitan RLK','TLB.REF_LVL_KESLTN_RLK_KODE = RLK.RLK_KODE');
		$this->db->where('TLB.MST_PEGAWAI_MPG_KODE',$key);
		$data = $this->db->get();
		return $data;
	}

	public function getlogbookbyid_model($id) {
		$this->db->select('TLB.TLB_ID');
		$this->db->select('DATE_FORMAT(TLB.TLB_TANGGAL,"%Y-%m-%d %H:%i:%s") AS TLB_TANGGAL');
		$this->db->select('TLB.MST_PEGAWAI_MPG_KODE');
		$this->db->select('TLB.TLB_NAMA_PEGAWAI');
		$this->db->select('TLB.MST_UNIT_MSU_KODE');
		$this->db->select('TLB.MST_KEG_LOGB_MKL_KODE');
		$this->db->select('TLB.TLB_NAMA_KEGIATAN');
		$this->db->select('TLB.TLB_KETERANGAN_KEGIATAN');
		$this->db->select('DATE_FORMAT(TLB.TLB_TANGGAL_AKHIR,"%Y-%m-%d %H:%i:%s") AS TLB_TANGGAL_AKHIR');
		$this->db->select('TLB.TLB_QTY');
		$this->db->select('TLB.TLB_IS_VERIF');
		$this->db->select('TLB.TLB_SOURCE_DATA');
		$this->db->select('TLB.TLB_OUTPUT');
		$this->db->select('TLB.REF_LVL_KESLTN_RLK_KODE');
		$this->db->select('RLK.RLK_NAMA');
		$this->db->from('trans_logbook TLB');
		$this->db->join('ref_level_kesulitan RLK','TLB.REF_LVL_KESLTN_RLK_KODE = RLK.RLK_KODE');
		// $this->db->where('TLB.MST_PEGAWAI_MPG_KODE',$key);
		$this->db->where('TLB.TLB_ID',$id);
		$data = $this->db->get();
		return $data;
	}

	public function getlogbookdatesorting_model($dates) {
		// var_dump($dates);exit();
		$this->db->select('TLB.TLB_ID');
		$this->db->select('DATE_FORMAT(TLB.TLB_TANGGAL,"%d-%m-%Y") AS TLB_TANGGAL');
		$this->db->select('TLB.MST_PEGAWAI_MPG_KODE');
		$this->db->select('TLB.TLB_NAMA_PEGAWAI');
		$this->db->select('TLB.MST_UNIT_MSU_KODE');
		$this->db->select('TLB.MST_KEG_LOGB_MKL_KODE');
		$this->db->select('TLB.TLB_NAMA_KEGIATAN');
		$this->db->select('TLB.TLB_KETERANGAN_KEGIATAN');
		$this->db->select('DATE_FORMAT(TLB.TLB_TANGGAL_AKHIR,"%d-%m-%Y") AS TLB_TANGGAL_AKHIR');
		$this->db->select('TLB.TLB_QTY');
		$this->db->select('TLB.TLB_IS_VERIF');
		$this->db->select('TLB.TLB_SOURCE_DATA');
		$this->db->select('TLB.TLB_OUTPUT');
		$this->db->select('TLB.REF_LVL_KESLTN_RLK_KODE');
		$this->db->select('RLK.RLK_NAMA');
		$this->db->from('trans_logbook TLB');
		$this->db->join('ref_level_kesulitan RLK','TLB.REF_LVL_KESLTN_RLK_KODE = RLK.RLK_KODE');
		$this->db->where('TLB.MST_PEGAWAI_MPG_KODE',$dates['key']);
		$this->db->where('TLB.TLB_TANGGAL >=',$dates['datestart']);
		$this->db->where('TLB.TLB_TANGGAL <=',$dates['dateend']);
		// $this->db->where("(TLB.TLB_TANGGAL BETWEEN DATE_FORMAT('".$dates['datestart']."00:00:00','%Y-%m-%d HH24:MI:SS') AND DATE_FORMAT('".$dates['dateend']."23:59:59','%Y-%m-%d HH24:MI:SS'))");
		$data = $this->db->get();
		return $data;
	}


}
	// public function getkegiatan_model($MPG_KODE) {
	// 	$this->db->select('MKL.MKL_KODE');
	// 	$this->db->select('MKL.MKL_NAMA');
	// 	$this->db->select('MKL.MKL_KETERANGAN');
	// 	$this->db->select('TUP.MST_UNIT_MSU_KODE');
	// 	$this->db->select('TJP.MST_PEG_KODE');
	// 	$this->db->select('TJP.REF_JAB_KODE');
	// 	$this->db->select('TUP.MST_PEGAWAI_MPG_KODE');
	// 	$this->db->from('mst_kegiatan_logbook MKL');
	// 	$this->db->join('trans_unit_pegawai TUP'," 1=1 AND substr(MKL.MST_UNIT_MSU_KODE,1,1) = TUP.MST_UNIT_MSU_KODE OR substr(MKL.MST_UNIT_MSU_KODE,3,1) = TUP.MST_UNIT_MSU_KODE");
	// 	$this->db->join("trans_jabatan_pegawai TJP","1=1 AND substr(MKL.REF_JN_JB_FNG_RJJABF_KOD,1,7) = TJP.REF_JAB_KODE OR substr(MKL.REF_JN_JB_FNG_RJJABF_KOD,9,7) = TJP.REF_JAB_KODE OR MKL.REF_JN_JB_FNG_RJJABF_KOD IS NULL");
	// 	$this->db->where("TUP.MST_PEGAWAI_MPG_KODE",$MPG_KODE);
	// 	$this->db->where("TJP.MST_PEG_KODE",$MPG_KODE);
	// 	$this->db->where("MKL.MKL_ISAKTIF", '1', true);
	// 	$this->db->where("MKL.MST_UNIT_MSU_KODE IS NOT NULL", NULL, false);
	// 	$this->db->group_by('MKL.MKL_KODE,MKL.MKL_NAMA,MKL.MKL_KETERANGAN,TUP.MST_UNIT_MSU_KODE');
	// 	$this->db->order_by("MKL.MKL_NAMA", "asc");
	// 	$data = $this->db->get();
	// 	return $data;
	// }
?>


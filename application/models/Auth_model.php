<?php 

/**
* 
*/
class Auth_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function auth($datalogin) {
		$this->db->select('MP.*');
		$this->db->select('RA.*');
		$this->db->select('TUP.*');
		$this->db->select('MSU.*');
		$this->db->select('TJP.*');
		$this->db->select('RJF.*');
		$this->db->from('mst_pegawai MP');
		$this->db->join('ref_agama RA','MP.REF_AGAMA_RAG_KODE = RA.RAG_KODE');
		$this->db->join('trans_unit_pegawai TUP','MP.MPG_KODE = TUP.MST_PEGAWAI_MPG_KODE');
		$this->db->join('mst_unit MSU','TUP.MST_UNIT_MSU_KODE = MSU.MSU_KODE');
		$this->db->join('trans_jabatan_pegawai TJP','MP.MPG_KODE = TJP.MST_PEG_KODE');
		$this->db->join('ref_jb_fungsional RJF','TJP.REF_JAB_KODE = RJF.REF_JB_FN_KODE');
		$this->db->where(array('MPG_NAMA' => $datalogin['username'],
								'MPG_HANDKEY' => $datalogin['password'] )
						);
		$query = $this->db->get()->row();
		// var_dump(json_encode($query));exit();
		return $query;
	}
}
 ?>
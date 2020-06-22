<?php 
/**
 * 
 */
class Masterlogbook_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getmasterlogbook_model($kode) {
		$this->db->select('MKL.*');
		$this->db->select("SUBSTRING(MKL.MST_UNIT_MSU_KODE,3,3) AS XX");
		$this->db->select('MSU.*');
		$this->db->select('RJF.*');
		$this->db->from('mst_kegiatan_logbook MKL');
		$this->db->join('mst_unit MSU','MKL.MST_UNIT_MSU_KODE = MSU.MSU_KODE OR MKL.MST_UNIT_MSU_KODE IS NULL OR (SUBSTRING(MKL.MST_UNIT_MSU_KODE,1,1)='.$kode.')');
		$this->db->join('ref_jb_fungsional RJF','MKL.REF_JN_JB_FNG_RJJABF_KOD = RJF.REF_JB_FN_KODE OR MKL.REF_JN_JB_FNG_RJJABF_KOD IS NULL');
		$this->db->where('MKL.MST_UNIT_MSU_KODE',$kode);
		$this->db->or_where('MKL.MST_UNIT_MSU_KODE',NULL,TRUE);
		$this->db->or_where('MKL.REF_JN_JB_FNG_RJJABF_KOD',NULL,TRUE);
		$this->db->or_where("(SUBSTRING(MKL.MST_UNIT_MSU_KODE, 1, 1) = '$kode')");
		$this->db->or_where("(SUBSTRING(MKL.MST_UNIT_MSU_KODE,3,3) = '$kode')");
		$this->db->group_by('MKL.MKL_NAMA');
		$query = $this->db->get();
		return $query;
	}

	function getjabatan_model() {
		$this->db->select('*');
		$this->db->from('ref_jb_fungsional');
		$data = $this->db->get();
		return $data->result_array();
	}

	function getunit_model() {
		$this->db->select('*');
		$this->db->from('mst_unit');
		$data = $this->db->get();
		return $data->result_array();
	}

	function getmasterlogbookbyid_model($id) {
		$this->db->select('MKL.*');
		// $this->db->select("SUBSTRING(MKL.MST_UNIT_MSU_KODE,3,3) AS XX");
		$this->db->select('MSU.*');
		$this->db->select('RJF.*');
		$this->db->from('mst_kegiatan_logbook MKL');
		$this->db->join('mst_unit MSU','MKL.MST_UNIT_MSU_KODE = MSU.MSU_KODE OR MKL.MST_UNIT_MSU_KODE IS NULL');
		$this->db->join('ref_jb_fungsional RJF','MKL.REF_JN_JB_FNG_RJJABF_KOD = RJF.REF_JB_FN_KODE OR MKL.REF_JN_JB_FNG_RJJABF_KOD IS NULL');
		$this->db->where('MKL.MKL_KODE',$id);
		$this->db->group_by('MKL.MKL_NAMA');
		$query = $this->db->get();
		return $query->result_array();
	}

	function savemasterlogbook_model($data) {
		$query = $this->db->insert('mst_kegiatan_logbook',$data);
		return $query;
	}

	function getmaxidmasterlogbook_model(){
		$this->db->select('MKL_KODE');
		$this->db->from('mst_kegiatan_logbook');
		$query = $this->db->get()->result_array();
		return max($query);
	}

	function savedef_model($maxkode,$data){
		if ($maxkode != null && $data != null) {
			$query1 = $this->db->insert('def_unit_logbook',array(	'MKL_KODE' => $maxkode,
																	'MST_UNIT_MSU_KODE' => $data['MST_UNIT_MSU_KODE']
																)
										);
			$query2 = $this->db->insert('def_jabatan_logbook', array('MKL_KODE' => $maxkode,
																	'REF_JAB_KODE' => $data['REF_JN_JB_FNG_RJJABF_KOD']
																)
										);
		}
	}

	function updatemasterlogbook_model($data){
		$this->db->where('MKL_KODE',$data['MKL_KODE']);
		$updatedefunit = $this->db->update('def_unit_logbook',array('MST_UNIT_MSU_KODE' =>$data['MST_UNIT_MSU_KODE'] ));
		if ($updatedefunit) {
			$this->db->where('MKL_KODE',$data['MKL_KODE']);
			$updatedefjabatan = $this->db->update('def_jabatan_logbook',array('REF_JAB_KODE' =>$data['REF_JN_JB_FNG_RJJABF_KOD'] ));
			if ($updatedefjabatan) {
				$this->db->where('MKL_KODE',$data['MKL_KODE']);
				$updatemasterlogbook = $this->db->update('mst_kegiatan_logbook',$data);
				return $updatemasterlogbook;
			}
		}
	}

	function deletemasterlogbook_model($delete) {
		if ($delete) {
			$this->db->where('MKL_KODE', $delete);
			$del1 = $this->db->delete('def_unit_logbook');

			$this->db->where('MKL_KODE', $delete);
			$del2 = $this->db->delete('def_jabatan_logbook');
		}
		if ($del2) {
			$this->db->where('MKL_KODE', $delete);
			$del3 = $this->db->delete('mst_kegiatan_logbook');
		}
		
	}
}

 ?>
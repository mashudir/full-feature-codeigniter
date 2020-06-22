<?php 
/**
 * 
 */
class Masteriki_model extends CI_Model
{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function getmasteriki_model($kode) {
		$this->db->select('MIKI.*');
		// $this->db->select("SUBSTRING(MKL.MST_UNIT_MSU_KODE,3,3) AS XX");
		$this->db->select('MSU.*');
		$this->db->select('RJF.*');
		$this->db->select('DUI.*');
		$this->db->select('DJI.*');
		$this->db->from('mst_iki MIKI');
		$this->db->join('def_unit_iki DUI','MIKI.MST_IKI_KODE = DUI.MST_IKI_KODE');
		$this->db->join('mst_unit MSU','DUI.MST_UNIT_MSU_KODE = MSU.MSU_KODE OR DUI.MST_UNIT_MSU_KODE IS NULL');
		$this->db->join('def_jabatan_iki DJI','MIKI.MST_IKI_KODE = DJI.MST_IKI_KODE');
		$this->db->join('ref_jb_fungsional RJF','DJI.REF_JAB_KODE = RJF.REF_JB_FN_KODE OR DJI.REF_JAB_KODE IS NULL');
		$this->db->where('MSU.MSU_KODE',$kode);
		// $this->db->group_by('MIKI.MST_IKI_INDIKATOR');
		$this->db->order_by('MIKI.MST_IKI_KATEGORI');
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
	function getmasterikibyid_model($id) {
		$this->db->select('MIKI.*');
		// $this->db->select("SUBSTRING(MKL.MST_UNIT_MSU_KODE,3,3) AS XX");
		$this->db->select('MSU.*');
		$this->db->select('RJF.*');
		$this->db->select('DUI.*');
		$this->db->select('DJI.*');
		$this->db->from('mst_iki MIKI');
		$this->db->join('def_unit_iki DUI','MIKI.MST_IKI_KODE = DUI.MST_IKI_KODE');
		$this->db->join('mst_unit MSU','DUI.MST_UNIT_MSU_KODE = MSU.MSU_KODE OR DUI.MST_UNIT_MSU_KODE IS NULL');
		$this->db->join('def_jabatan_iki DJI','MIKI.MST_IKI_KODE = DJI.MST_IKI_KODE');
		$this->db->join('ref_jb_fungsional RJF','DJI.REF_JAB_KODE = RJF.REF_JB_FN_KODE OR DJI.REF_JAB_KODE IS NULL');
		$this->db->where('MIKI.MST_IKI_KODE',$id);
		$this->db->group_by('MIKI.MST_IKI_INDIKATOR');
		$this->db->order_by('MIKI.MST_IKI_KATEGORI');
		$query = $this->db->get();
		return $query->result_array();
	}
	function savemasteriki_model($data){
		$query = $this->db->insert('mst_iki',$data);
		return $query;
	}
	function getmaxkodeiki_model(){
		$this->db->select('MST_IKI_KODE');
		$this->db->from('mst_iki');
		$query = $this->db->get()->result_array();
		return max($query);
	}
	function savedef_model($maxkode,$def){
		if ($maxkode != null && $def != null) {
			$query1 = $this->db->insert('def_unit_iki',array('MST_IKI_KODE' => $maxkode,
															'MST_UNIT_MSU_KODE' => $def['MSU_KODE']
															)
										);
			$query2 = $this->db->insert('def_jabatan_iki',array('MST_IKI_KODE' => $maxkode,
																'REF_JAB_KODE' => $def['REF_JB_FN_KODE']
																)
										);
		}
	}
	function updatemasteriki_model($data,$def){
		$this->db->where('MST_IKI_KODE',$data['MST_IKI_KODE']);
		$updatedefunit = $this->db->update('def_unit_iki',array('MST_UNIT_MSU_KODE' =>$def['MSU_KODE'] ));
		if ($updatedefunit) {
			$this->db->where('MST_IKI_KODE',$data['MST_IKI_KODE']);
			$updatedefjabatan = $this->db->update('def_jabatan_iki',array('REF_JAB_KODE' =>$def['REF_JB_FN_KODE'] ));
			if ($updatedefjabatan) {
				$this->db->where('MST_IKI_KODE',$data['MST_IKI_KODE']);
				$updatemasterlogbook = $this->db->update('mst_iki',$data);
				return $updatemasterlogbook;
			}
		}
	}
	function cekPresentase_model($data,$unitdanjabatan){
		$this->db->select_sum('mi.MST_IKI_BOBOT');
		$this->db->from('mst_iki mi');
		$this->db->join('def_unit_iki dui','mi.MST_IKI_KODE = dui.MST_IKI_KODE');
		$this->db->join('def_jabatan_iki dji','mi.MST_IKI_KODE = dji.MST_IKI_KODE');
		$this->db->where('mi.MST_IKI_KATEGORI',$data['MST_IKI_KATEGORI']);
		$this->db->where('dui.MST_UNIT_MSU_KODE',$unitdanjabatan['MSU_KODE']);
		$this->db->where('dji.REF_JAB_KODE',$unitdanjabatan['REF_JB_FN_KODE']);
		$data = $this->db->get()->result_array();
		return intval($data[0]['MST_IKI_BOBOT']);
	}
	function deletemasteriki_model($delete) {
		if ($delete) {
			$this->db->where('MST_IKI_KODE', $delete);
			$del1 = $this->db->delete('def_unit_iki');

			$this->db->where('MST_IKI_KODE', $delete);
			$del2 = $this->db->delete('def_jabatan_iki');
		}
		if ($del2) {
			$this->db->where('MST_IKI_KODE', $delete);
			$del3 = $this->db->delete('mst_iki');
		}
		
	}
}

 ?>
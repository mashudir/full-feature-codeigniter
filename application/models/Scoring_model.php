<?php 

/**
 * 
 */
class Scoring_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function getEachPegawai_model($unit,$MPG_KODE){
		$this->db->select('PG.*');
		$this->db->select('AG.*');
		$this->db->select('JB.*');
		$this->db->select('MSU.*');
		$this->db->from('mst_pegawai PG');
		$this->db->join('ref_agama AG','PG.REF_AGAMA_RAG_KODE = AG.RAG_KODE');
		$this->db->join('trans_jabatan_pegawai TJP','PG.MPG_KODE = TJP.MST_PEG_KODE');
		$this->db->join('ref_jb_fungsional JB','TJP.REF_JAB_KODE = JB.REF_JB_FN_KODE');
		$this->db->join('trans_unit_pegawai TUP','PG.MPG_KODE = TUP.MST_PEGAWAI_MPG_KODE');
		$this->db->join('mst_unit MSU','TUP.MST_UNIT_MSU_KODE = MSU.MSU_KODE');
		$this->db->where('PG.MPG_KODE',$MPG_KODE);
		$this->db->where('TUP.MST_UNIT_MSU_KODE',$unit);
		// $this->db->group_by('MSU.MSU_NAMA');
		$data = $this->db->get();
		return $data->result_array();
	}
	function getItemPenilaianKualitas_model($unit,$jabatan){
		$this->db->select('*');
		$this->db->from('mst_iki mi');
		$this->db->join('def_unit_iki dui','mi.MST_IKI_KODE = dui.MST_IKI_KODE');
		$this->db->join('def_jabatan_iki dji','mi.MST_IKI_KODE = dji.MST_IKI_KODE');
		$this->db->where('mi.MST_IKI_KATEGORI','kualitas');
		$this->db->where('dui.MST_UNIT_MSU_KODE',$unit);
		$this->db->where('dji.REF_JAB_KODE',$jabatan);
		$this->db->group_by('mi.MST_IKI_KODE');
		$data = $this->db->get();
		return $data->result_array();
	}	
	function getItemPenilaianPerilaku_model($unit,$jabatan){
		$this->db->select('*');
		$this->db->from('mst_iki mi');
		$this->db->join('def_unit_iki dui','mi.MST_IKI_KODE = dui.MST_IKI_KODE');
		$this->db->join('def_jabatan_iki dji','mi.MST_IKI_KODE = dji.MST_IKI_KODE');
		$this->db->where('mi.MST_IKI_KATEGORI','perilaku');
		$this->db->where('dui.MST_UNIT_MSU_KODE',$unit);
		$this->db->where('dji.REF_JAB_KODE',$jabatan);
		$this->db->group_by('mi.MST_IKI_KODE');
		$data = $this->db->get();
		return $data->result_array();
	}
	function inputNilai_model($data){
		// var_dump(count($data['PERILAKU']));exit();
		for ($i=0; $i < count($data['IDPERILAKU']) ; $i++) { 
			$this->db->insert('penilaian',array('MPG_KODE'=>$data['MPG_KODE'],
												'MSU_KODE'=>$data['MSU_KODE'],
												'IKI_KODE'=>$data['IDPERILAKU'][$i],
												'SCORE'	=>$data['PERILAKU'][$i]
											)
							);
		}
		for ($i=0; $i < count($data['IDKUALITAS']) ; $i++) { 
			$query = $this->db->insert('penilaian',array('MPG_KODE'=>$data['MPG_KODE'],
												'MSU_KODE'=>$data['MSU_KODE'],
												'IKI_KODE'=>$data['IDKUALITAS'][$i],
												'SCORE'	=>$data['KUALITAS'][$i]
											)
							);
		}
		return $query;
	}
	function cekTanggalPenilaian_model($kode,$now){
		$this->db->select('DATE_FORMAT(TGL_PENILAIAN,"%m")');
		$this->db->from('penilaian');
		$this->db->where('DATE_FORMAT(TGL_PENILAIAN,"%m")',$now);
		$this->db->where('MPG_KODE',$kode);
		$query = $this->db->get();
		return $query->result_array();
	}

	function notifUnscored_model($unit,$now){
		$query = 'SELECT mpg.MPG_KODE, mpg.MPG_NAMA
				FROM mst_pegawai mpg
				JOIN trans_unit_pegawai tup
				WHERE mpg.MPG_KODE = tup.MST_PEGAWAI_MPG_KODE
				AND tup.MST_UNIT_MSU_KODE = '.$unit.'
				AND mpg.MPG_KODE != '.$this->session->userdata('KODE').'
				AND NOT EXISTS (SELECT p.MPG_KODE FROM penilaian p
								WHERE DATE_FORMAT(p.TGL_PENILAIAN, "%m") = '.$now.'
								AND mpg.MPG_KODE = p.MPG_KODE)
				GROUP BY mpg.MPG_KODE';
		$result = $this->db->query($query);
		return $result->result_array();
	}
}

 ?>
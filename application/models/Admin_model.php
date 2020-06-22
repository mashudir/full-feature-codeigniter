<?php 

/**
 * 
 */
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getagama_model() {
		$this->db->select('*');
		$this->db->from('ref_agama');
		$data = $this->db->get();
		return $data->result_array();
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

	function getmaxkode_model(){
		$this->db->select('MPG_KODE');
		$this->db->from('mst_pegawai');
		$this->db->order_by('MPG_KODE','desc');
		$data = $this->db->get();
		return $data->result_array();
	}

	function getmaxnip_model($MSU_KODE){
		$this->db->select('MP.MPG_NIP');
		$this->db->from('mst_pegawai MP');
		$this->db->join('trans_unit_pegawai TUP','MP.MPG_KODE = TUP.MST_PEGAWAI_MPG_KODE');
		$this->db->join('mst_unit MSU','TUP.MST_UNIT_MSU_KODE = MSU.MSU_KODE');
		$this->db->where('MSU.MSU_KODE',$MSU_KODE);
		$this->db->order_by('MPG_NIP','desc');
		$data = $this->db->get();
		return $data->result_array();
	}

	function getpegawai_model($unit) {
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
		$this->db->where('TUP.MST_UNIT_MSU_KODE',$unit);
		$this->db->where("PG.MPG_KODE !=",$this->session->userdata['KODE']);
		$this->db->order_by('PG.MPG_KODE');
		$data = $this->db->get();
		return $data->result_array();
	}

	function getpegawaibyid_model($unit,$MPG_KODE) {
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
	
	function savepegawai_model($data) {
		$this->db->insert('mst_pegawai', array('MPG_KODE' =>$data['MPG_KODE'],
											'MPG_NAMA' =>$data['MPG_NAMA'],
											'MPG_HANDKEY'=>$data['MPG_HANDKEY'],
											'MPG_NIP'=>$data['MPG_NIP'],
											'MPG_ALAMAT'=>$data['MPG_ALAMAT'],
											'MPG_JK'=>$data['MPG_JK'],
											'MPG_NO_TELP'=>$data['MPG_NO_TELP'],
											'MPG_EMAIL'=>$data['MPG_EMAIL'],
											'MPG_ISAKTIF'=>$data['MPG_ISAKTIF'],
											'REF_AGAMA_RAG_KODE'=>$data['REF_AGAMA_RAG_KODE'],
											'MPG_IS_VERIF'=>$data['MPG_IS_VERIF'],
											'MPG_TMPT_LAHIR'=>$data['MPG_TMPT_LAHIR'],
											'MPG_TGL_LAHIR'=>$data['MPG_TGL_LAHIR'],
											'MPG_FOTO'=>$data['MPG_FOTO'],
											 ));
		$this->db->insert('trans_unit_pegawai',array('MST_PEGAWAI_MPG_KODE' => $data['MST_PEGAWAI_MPG_KODE'],
													'MST_UNIT_MSU_KODE' => $data['MST_UNIT_MSU_KODE']
											 ));
		$this->db->insert('trans_jabatan_pegawai',array('MST_PEG_KODE' => $data['MST_PEG_KODE'],
														'REF_JAB_KODE' => $data['REF_JAB_KODE']
													));
        return $this->db->insert_id();
	}

	 public function updatepegawai_model($where, $data){
	 	// var_dump($data);exit();

	 	if (array_key_exists('MPG_FOTO',$data)) {
	 		$this->db->update('mst_pegawai', array(
											'MPG_NAMA' =>$data['MPG_NAMA'],
											'MPG_ALAMAT'=>$data['MPG_ALAMAT'],
											'MPG_JK'=>$data['MPG_JK'],
											'MPG_NO_TELP'=>$data['MPG_NO_TELP'],
											'MPG_EMAIL'=>$data['MPG_EMAIL'],
											'MPG_ISAKTIF'=>$data['MPG_ISAKTIF'],
											'REF_AGAMA_RAG_KODE'=>$data['REF_AGAMA_RAG_KODE'],
											'MPG_IS_VERIF'=>$data['MPG_IS_VERIF'],
											'MPG_TMPT_LAHIR'=>$data['MPG_TMPT_LAHIR'],
											'MPG_TGL_LAHIR'=>$data['MPG_TGL_LAHIR'],
											'MPG_FOTO'=>$data['MPG_FOTO'],
											 ), $where);
	 	}else{
	 		$this->db->update('mst_pegawai', array(
											'MPG_NAMA' =>$data['MPG_NAMA'],
											'MPG_ALAMAT'=>$data['MPG_ALAMAT'],
											'MPG_JK'=>$data['MPG_JK'],
											'MPG_NO_TELP'=>$data['MPG_NO_TELP'],
											'MPG_EMAIL'=>$data['MPG_EMAIL'],
											'MPG_ISAKTIF'=>$data['MPG_ISAKTIF'],
											'REF_AGAMA_RAG_KODE'=>$data['REF_AGAMA_RAG_KODE'],
											'MPG_IS_VERIF'=>$data['MPG_IS_VERIF'],
											'MPG_TMPT_LAHIR'=>$data['MPG_TMPT_LAHIR'],
											'MPG_TGL_LAHIR'=>$data['MPG_TGL_LAHIR'],
											 ), $where);
	 	}

	 	$this->db->set('MST_UNIT_MSU_KODE',$data['MST_UNIT_MSU_KODE']);
        $this->db->where(array('MST_PEGAWAI_MPG_KODE'=>$data['MST_PEGAWAI_MPG_KODE']));
        $this->db->update('trans_unit_pegawai');

        $this->db->set('REF_JAB_KODE',$data['REF_JAB_KODE']);
        $this->db->where(array('MST_PEG_KODE'=>$data['MST_PEG_KODE']));
        $this->db->update('trans_jabatan_pegawai');

        return $this->db->affected_rows();
    }

	function deletepegawai_model($delete){
		$this->db->where('MST_PEGAWAI_MPG_KODE',$delete);
		$delete_tup = $this->db->delete('trans_unit_pegawai');
		$this->db->where('MST_PEG_KODE',$delete);
		$delete_tjp = $this->db->delete('trans_jabatan_pegawai');
		$this->db->where('MST_PEGAWAI_MPG_KODE',$delete);
		$delete_tlb = $this->db->delete('trans_logbook');
		$this->db->where('MPG_KODE', $delete);
		$delete_mp = $this->db->delete('mst_pegawai');
		
	}

	function getlogbookbyidpegawai_model($id,$date){
		// var_dump($id);exit();
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
		$this->db->where('TLB.MST_PEGAWAI_MPG_KODE',$id);
		$this->db->where('TLB.TLB_TANGGAL >=',$date['datestart']);
		$this->db->where('TLB.TLB_TANGGAL <=',$date['dateend']);
		$data = $this->db->get();
		// var_dump($data->result_array());exit();
		return $data->result_array();
	}
	function check_model($data){
		$this->db->where('TLB_ID',$data['id']);
		$query = $this->db->update('trans_logbook',array('TLB_IS_VERIF' => $data['veriv']));
		return $query;
	}

	public function getlogbookdatesorting_model($kode,$dates) {
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
		$this->db->where('TLB.MST_PEGAWAI_MPG_KODE',$kode);
		$this->db->where('TLB.TLB_TANGGAL >=',$dates['datestart']);
		$this->db->where('TLB.TLB_TANGGAL <=',$dates['dateend']);
		// $this->db->where("(TLB.TLB_TANGGAL BETWEEN DATE_FORMAT('".$dates['datestart']."00:00:00','%Y-%m-%d HH24:MI:SS') AND DATE_FORMAT('".$dates['dateend']."23:59:59','%Y-%m-%d HH24:MI:SS'))");
		$data = $this->db->get();
		return $data;
	}
}

?>
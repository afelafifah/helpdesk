<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function all()
	{
		$kategori=$_POST['kategori'];
		$jk=$_POST['jk'];
		$status=$_POST['status'];
		if($kategori!=""){
			$and="AND penduduk.id_kategori='$kategori'";
		}else{
			$and="";
		}
		if($jk!=""){
			$and1="AND jk='$jk'";
		}else{
			$and1="";
		}
		if($status!=""){
			$and2="AND status='$status'";
		}else{
			$and2="";
		}
		$q= $this->db->query("SELECT * FROM penduduk 
							JOIN kategori ON kategori.id_kategori=penduduk.id_kategori
							WHERE penduduk.id_pegawai!=''
							".$and." ".$and1." ".$and2."
							");
		return $q->result();	
	}
}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */
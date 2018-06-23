<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_klasifikasi extends CI_Model {

	public function getrow($id)
	{
		return $this->db->query("select * from instansi where id_instansi='$id'");
	}
	public function getrowkategori($id)
	{
		return $this->db->query("select * from jabatan where id_jabatan='$id'");
	}
	public function getnum($id,$idklas)
	{
		return $this->db->query("select * from jabatan_instansi where id_jabatan='$id' and id_instansi='$idklas'");
	}
}

/* End of file M_klasifikasi.php */
/* Location: ./application/models/M_klasifikasi.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_entry extends CI_Model {

	public function getkategori($id)
	{
	return	$this->db->query("SELECT distinct jabatan.id_jabatan,jabatan.jabatan FROM instansi_pegawai
						JOIN jabatan_instansi ON instansi_pegawai.id_instansi=jabatan_instansi.id_instansi
						JOIN jabatan ON jabatan.id_jabatan=jabatan_instansi.id_jabatan
						AND instansi_pegawai.id_pegawai='$id'");
	}

}

/* End of file M_entry.php */
/* Location: ./application/models/M_entry.php */
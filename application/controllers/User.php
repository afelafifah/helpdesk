<?php

class User extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		no_access();
		levelsuper();
	}
	public function index()
	{
		$data=array(
			"title"=>'Manajemen level',
			"menu"=>getmenu(),
			"all"=>$this->db->get('pengguna')->result(),
			"aktif"=>"user",
			"content"=>"user/index.php",
		);
		$this->breadcrumb->append_crumb('User', site_url('user'));
		$this->load->view('pengguna/template',$data);
	}
	public function add()
	{
		$id=$_POST['pegawai'];
		$cek=$this->db->query("SELECT * FROM pengguna where id_pegawai='$id'")->num_rows();
		if($cek>0){
			$this->session->set_flashdata('error', 'User Sudah Memiliki level Di Aplikasi');
			redirect('User');
		}else{
			$object=array(
				"id_pengguna"=>"",
				"username"=>$id,
				"id_pegawai"=>$id,
				"password"=>md5($id),
				"level"=>$_POST['level'],
				"status"=>1
			);
			$this->db->insert('pengguna', $object);
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Tambahkan');
			redirect('User');
		}
		
	}
	public function reset($id)
	{
		$cek=$this->db->query("SELECT * FROM pengguna where id_pengguna='$id'")->row_array();
		
		$object=array(
			"username"=>$cek['id_pegawai'],
			"password"=>md5($cek['id_pegawai']),
		);
		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $object);
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Update');
		redirect('User');
	}
	public function delete($id)
	{
		$this->db->query("DELETE FROM pengguna where id_pengguna='$id'");
		$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		redirect('User');
	}
}

<?php

class User_keluhan extends CI_Controller {
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
		//levelsuper();
	}
	public function index()
	{
		$data=array(
			"title"=>'Keluhan',
			"menu"=>getmenu(),
			"all"=>$this->db->get('keluhan')->result(),
			"aktif"=>"keluhan",
			"content"=>"user_keluhan/index.php",
		);
		$this->breadcrumb->append_crumb('Keluhan', site_url('user_keluhan'));
		$this->load->view('pengguna/template',$data);
	}
	
	public function addkeluhan()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('keluhan', 'keluhan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('user_keluhan');
		}else{
			$foto=$_FILES['gambar']['name'];
			$dir		= "upload/";
			$dir1		= "uploadkeluhan/";
			if($_FILES['gambar']['name']!=""){
				$file='gambar'; //name pada input type file
				$filename 	= $_FILES['gambar']['name'];
				$dir		= "upload/";
				$dir1		= "uploadkeluhan/";
				$file		= 'gambar';
				$new_name='uploadfoto'.date('YmdHis').$_POST['id']; //name pada input type file
				$tipe 		= $_FILES['gambar']['type'];
				$ukuran 	= $_FILES['gambar']['size'];
				$vdir_upload	= $dir;
				$file_name		= $_FILES[''.$file.'']["name"];
				$vfile_upload	= $vdir_upload.$file;
				$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
				move_uploaded_file ($tmp_file, $dir.$file_name);
				date_default_timezone_get('Asia/Jakarta');
				$source_url=$dir.$file_name;
				$info=getimagesize($source_url);
				if ($ukuran < 300000 and $ukuran > 10000) {	
					$quality=100;
				}
				elseif ($ukuran < 1000000 and $ukuran > 300000) {	
					$quality=70;
				}
				elseif ($ukuran < 1500000 and $ukuran > 1000000) {	
					$quality=50;
				}
				elseif ($ukuran < 2000000 and $ukuran > 1000000) {	
					$quality=40;
				}
				elseif ($ukuran < 2500000 and $ukuran > 2000000) {	
					$quality=30;
				}
				elseif ($ukuran < 3000000 and $ukuran > 2500000) {	
					$quality=20;
				}
				elseif ($ukuran > 3000000) {	
					$quality=10;
				}else{
					$quality=10;
				}
				$gambar = imagecreatefromjpeg($source_url);
				$ext='.jpeg';
				if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
					unlink($source_url);
				}else{
					unlink($source_url);
				}
			}else{
				$new_name="";
				$ext="";
			}
			$data=array(
				"id_keluhan"=>$_POST['id'],
				"keluhan"=>$_POST['keluhan'],
				"foto"=>$new_name.$ext,
				"status"=>1,
			);
			$this->db->insert('keluhan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('user_keluhan');
		}
	}
	
	public function editkeluhan($id)
	{
		$data=array(
			"title"=>'Edit Keluhan',
			"menu"=>getmenu(),
			"getrow"=>$this->db->where('id_keluhan',$id)->get('keluhan')->row_array(),
			"aktif"=>"keluhan",
			"id"=>$id,
			"content"=>"User_keluhan/editkeluhan.php",
		);
		$this->breadcrumb->append_crumb('Data Tiket', site_url('user_keluhan'));
		//$this->breadcrumb->append_crumb('Edit Data Tiket <i>'.getnamakeluhan($id).'</i>', site_url('user_keluhan'));
		$this->load->view('pengguna/template',$data);
	}
	
	public function editkeluhanproses()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('keluhan', 'keluhan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Edit");
			redirect('user_keluhan/editkeluhan/'.$id);
		}else{
			$foto=$_FILES['gambar']['name'];
			$dir		= "upload/";
			$dir1		= "uploadkeluhan/";
			if($_FILES['gambar']['name']!=""){
				$file='gambar'; //name pada input type file
				$filename 	= $_FILES['gambar']['name'];
				$dir		= "upload/";
				$dir1		= "uploadkeluhan/";
				$file		= 'gambar';
				$new_name='uploadfoto'.date('YmdHis').$_POST['id_pegawai']; //name pada input type file
				$tipe 		= $_FILES['gambar']['type'];
				$ukuran 	= $_FILES['gambar']['size'];
				$vdir_upload	= $dir;
				$file_name		= $_FILES[''.$file.'']["name"];
				$vfile_upload	= $vdir_upload.$file;
				$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
				move_uploaded_file ($tmp_file, $dir.$file_name);
				date_default_timezone_get('Asia/Jakarta');
				$source_url=$dir.$file_name;
				$info=getimagesize($source_url);
				if ($ukuran < 300000 and $ukuran > 10000) {	
					$quality=100;
				}
				elseif ($ukuran < 1000000 and $ukuran > 300000) {	
					$quality=70;
				}
				elseif ($ukuran < 1500000 and $ukuran > 1000000) {	
					$quality=50;
				}
				elseif ($ukuran < 2000000 and $ukuran > 1000000) {	
					$quality=40;
				}
				elseif ($ukuran < 2500000 and $ukuran > 2000000) {	
					$quality=30;
				}
				elseif ($ukuran < 3000000 and $ukuran > 2500000) {	
					$quality=20;
				}
				elseif ($ukuran > 3000000) {	
					$quality=10;
				}else{
					$quality=10;
				}
				$gambar = imagecreatefromjpeg($source_url);
				$ext='.jpeg';
				if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
					unlink($source_url);
				}else{
					unlink($source_url);
				}
				unlink("uploadkeluhan/".$_POST['fotohidden']);
			}else{
				$new_name=$_POST['fotohidden'];
				$ext="";
			}
			$data=array(
				"id_keluhan"=>$_POST['id'],
				"keluhan"=>$_POST['keluhan'],
				"foto"=>$new_name.$ext,
				"status"=>1,
			);
			$this->db->where('id_keluhan', $id);
			$this->db->update('keluhan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('user_keluhan/editkeluhan/'.$id);
		}
	}
	
	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('User_keluhan');
		}else{
			$this->db->where('id_keluhan', $id);
			$this->db->delete('keluhan');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('User_keluhan');
		}
	}

}

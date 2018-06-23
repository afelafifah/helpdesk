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
		$this->load->model('M_userkeluhan');
		$this->load->helper('form');
		no_access();
		//levelsuper();
	}
	public function index()
	{
		/*$data=array(
			"title"=>'Keluhan',
			"menu"=>getmenu(),
			"all"=>$this->db->get('keluhan')->result(),
			"aktif"=>"keluhan",
			"content"=>"user_keluhan/index.php",
		);
		$this->breadcrumb->append_crumb('Keluhan', site_url('user_keluhan'));
		$this->load->view('pengguna/template',$data);
		*/
		redirect('User_keluhan/detailtiket/');
	}
	
	public function detailtiket()
	{
		$data=array(
			"title"=>'Entri Data Tiket',
			"menu"=>getmenu(),
			//"all"=>$this->db->where('id_keluhan',$id)->get('keluhan')->result(),
			"all"=>$this->db->get('keluhan')->result(),
			"aktif"=>"user_keluhan",
			"content"=>"user_keluhan/detail.php",
		);
		//$this->breadcrumb->append_crumb('Entri Data Keluhan', site_url('entry'));
		$this->breadcrumb->append_crumb('Entri Data Tiket Keluhan <i>', site_url('user_keluhan'));
		$this->load->view('pengguna/template',$data);
	}
	public function addkeluhan()
	{
		$data=array(
			"title"=>'Tambah Tiket||Entri Data Tiket',
			"menu"=>getmenu(),
			//"all"=>$this->db->where('id_keluhan',$id)->get('keluhan')->row_array(),
			"aktif"=>"User_keluhan",
			//"id"=>$id,
			"content"=>"user_keluhan/addkeluhan.php",
		);
		//$this->breadcrumb->append_crumb('Entri Data Keluhan', site_url('entry'));
		$this->breadcrumb->append_crumb('Entri Data Tiket Keluhan', site_url('user_keluhan'));
		$this->breadcrumb->append_crumb('Tambah Tiket Keluhan', site_url('user_keluhan'));
		$this->load->view('pengguna/template',$data);
	}
	public function addprocessin()
	{
		$this->form_validation->set_rules('id_keluhan', 'id_keluhan', 'required');
		$this->form_validation->set_rules('keluhan', 'keluhan', 'required');
		$id=$_POST['id_keluhan'];
		$cek=$this->db->query("select * from keluhan where id_keluhan='$id'")->num_rows();
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('user_keluhan/addkeluhan/');
		}else{
			$foto		=$_FILES['gambar']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			if($_FILES['gambar']['name']!=""){
				$file='gambar'; //name pada input type file
				$filename 	= $_FILES['gambar']['name'];
				$dir		= "upload/";
				$dir1		= "uploads/";
				$file		= 'gambar';
				$new_name='uploadfoto'.date('YmdHis').$_POST['id_keluhan']; //name pada input type file
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
				"id_keluhan"=>$_POST['id_keluhan'],
				"keluhan"=>strtoupper($_POST['keluhan']),
				"foto"=>$new_name.$ext,
				"status"=>1,
			);
			$this->db->insert('keluhan',$data);
			/*for ($i=0; $i < count($_POST['instansi']); $i++) { 
				$objek=array(
					"id_pegawai"=>$_POST['id_pegawai'],
					"id_instansi"=>$_POST['instansi'][$i],
				);
				$this->db->insert('instansi_pegawai', $objek);
			}*/
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('user_keluhan/detailtiket/');
		}
	}
	/*public function keluhan($id)
	{
		$keluhan=getTiket($id);
		if($id==""){
			$this->session->set_flashdata('error',"Data Gagal Di Update");
			redirect('user_keluhan/detailtiket/'.$keluhan);
		}else{
			$data=array(
				"keluhan"=>$id,
			);
			$this->db->where('id_keluhan', $keluhan);
			$this->db->update('keluhan',$data);
			$this->session->set_flashdata('sukses', getnama($id)." Berhasil Di Jadikan Kepala Keluarga");
			redirect('entry/detailtiket/'.$keluhan);
		}
	}*/
	public function detailkeluhan($id)
	{
		//$keluhan=getTiket($id);
		$getrow=$this->M_userkeluhan->getrow($id)->row_array();
		$data=array(
			"title"=>'Detail Tiket Individu||Entri Data Tiket',
			"menu"=>getmenu(),
			"aktif"=>"user_keluhan",
			"all"=>$this->db->where('id_keluhan',$id)->get('keluhan')->row_array(),
			"id"=>$id,
			//"getrow"=>$this->db->where('id_keluhan', $id)->get('keluhan')->row_array(),
			//"getklasifikasi"=>$this->M_entry->getKategori($id)->result(),
			"content"=>"user_keluhan/detailkeluhan.php",
		);
		//$this->breadcrumb->append_crumb('Entri Data Keluhan', site_url('entry'));
		$this->breadcrumb->append_crumb('Entri Data Tiket Keluhan', site_url('user_keluhan'));
		$this->breadcrumb->append_crumb('Detail Tiket Individu di <strong><i>'.$getrow['id_keluhan'].'</i></strong>', site_url('user_keluhan/detailkeluhan/'.$id));
		$this->load->view('pengguna/template',$data);
	}
	public function hapusindividu($id_pegawai)
	{
		$keluhan=getKK($id_pegawai);
		$getrow=$this->db->query("select * from pegawai where id_pegawai='$id_pegawai'")->row_array();
		$getfile=$this->db->query("select * from file where id_pegawai='$id_pegawai'")->result();
		$this->db->query("delete from instansi_pegawai where id_pegawai='$id_pegawai'");
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->delete('pegawai');
		unlink("uploads/".$getrow['foto']);
		foreach ($getfile as $row) {
			unlink("uploads/".$row->file);
		}
		$this->db->query("delete from file where id_pegawai='$id_pegawai'");
		$data=array(
			"keluhan"=>"",
		);
		$this->db->where('keluhan', $id_pegawai);
		$this->db->update('keluhan', $data);
		$this->session->set_flashdata('sukses', "Seluruh Data Individu Berhasil Dihapus");
		redirect('entry/detailtiket/'.$keluhan);
	}
	public function deadindividu($id_pegawai)
	{
		$keluhan=getKK($id_pegawai);
		$data=array(
			"keluhan"=>"",
		);
		$data2=array(
			"status"=>2,
		);
		$this->db->where('keluhan', $id_pegawai);
		$this->db->update('keluhan', $data);
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('pegawai', $data2);
		$this->session->set_flashdata('sukses', "Data Berhasil Dinonaktifkan");
		redirect('entry/detailtiket/'.$keluhan);
	}
	public function onindividu($id_pegawai)
	{
		$keluhan=getKK($id_pegawai);
		$data2=array(
			"status"=>1,
		);
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('pegawai', $data2);
		$this->session->set_flashdata('sukses', "Data Berhasil Diaktifkan");
		redirect('entry/detailtiket/'.$keluhan);
	}
	
}
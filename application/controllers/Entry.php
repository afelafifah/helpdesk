<?php 
class Entry extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_entry');
		no_access();
	}
	public function index()
	{
		$data=array(
			"title"=>'Entri Data',
			"menu"=>getmenu(),
			"all"=>$this->db->get('tiket')->result(),
			"aktif"=>"entry",
			"content"=>"entry/index.php",
		);
		$this->breadcrumb->append_crumb('Entri Data Tiket', site_url('entry'));
		$this->load->view('pengguna/template',$data);
	}
	public function addkk()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('no_tiket', 'no_tiket', 'required');
		$this->form_validation->set_rules('rt', 'rt', 'required');
		$this->form_validation->set_rules('rw', 'rw', 'required');
		$id=$_POST['no_tiket'];
		$cek=$this->db->query("select * from tiket where no_tiket='$id'")->num_rows();
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('entry');
		}elseif($cek>0){
			$this->session->set_flashdata('error',"No Tiket Sudah Digunakan");
			redirect('entry');
		}else{
			$data=array(
				"id_tiket"=>$_POST['id'],
				"no_tiket"=>$_POST['no_tiket'],
				"rt"=>$_POST['rt'],
				"rw"=>$_POST['rw'],
				"tiket"=>"",
				"status"=>1,
			);
			$this->db->insert('tiket',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('entry');
		}
	}
	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('Entry');
		}else{
			$this->db->where('id_tiket', $id);
			$this->db->delete('tiket');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('Entry');
		}
	}
	public function editkk($id)
	{
		$data=array(
			"title"=>'Edit Tiket||Entri Data',
			"menu"=>getmenu(),
			"getrow"=>$this->db->where('id_tiket',$id)->get('tiket')->row_array(),
			"aktif"=>"entry",
			"id"=>$id,
			"content"=>"entry/editkk.php",
		);
		$this->breadcrumb->append_crumb('Entri Data Tiket', site_url('entry'));
		$this->breadcrumb->append_crumb('Edit Data Tiket <i>'.getnamakk($id).'</i>', site_url('entry'));
		$this->load->view('pengguna/template',$data);
	}
	public function editkkprocess()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('no_tiket', 'no_tiket', 'required');
		$this->form_validation->set_rules('rt', 'rt', 'required');
		$this->form_validation->set_rules('rw', 'rw', 'required');
		$id=$_POST['id'];
		$cek=$this->db->query("select * from tiket where no_tiket='$id'")->num_rows();
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Edit");
			redirect('entry/editkk/'.$id);
		}elseif($cek>0){
			$this->session->set_flashdata('error',"No Tiket Sudah Digunakan");
			redirect('entry/editkk/'.$id);
		}else{
			$data=array(
				"no_tiket"=>$_POST['no_tiket'],
				"rt"=>$_POST['rt'],
				"rw"=>$_POST['rw'],
			);
			$this->db->where('id_tiket', $id);
			$this->db->update('tiket',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('entry/editkk/'.$id);
		}
	}
	public function detailkk($id)
	{
		$data=array(
			"title"=>'Detail Tiket||Entri Data',
			"menu"=>getmenu(),
			"all"=>$this->db->where('id_tiket',$id)->get('pegawai')->result(),
			"aktif"=>"entry",
			"id"=>$id,
			"content"=>"entry/detail.php",
		);
		$this->breadcrumb->append_crumb('Entri Data Tiket', site_url('entry'));
		$this->breadcrumb->append_crumb('Data Individu Tiket <i>'.getnamakk($id).'</i>', site_url('entry'));
		$this->load->view('pengguna/template',$data);
	}
	public function addindividu($id)
	{
		$data=array(
			"title"=>'Tambah Individu||Detail Tiket||Entri Data',
			"title"=>'Tambah Individu||Detail Tiket||Entri Data',
			"menu"=>getmenu(),
			"aktif"=>"entry",
			"id"=>$id,
			"content"=>"entry/addindividu.php",
		);
		$this->breadcrumb->append_crumb('Entri Data Tiket', site_url('entry'));
		$this->breadcrumb->append_crumb('Data Individu Tiket <i>'.getnamakk($id).'</i>', site_url('entry/detailkk/'.$id));
		$this->breadcrumb->append_crumb('Tambah Individu Tiket', site_url('entry'));
		$this->load->view('pengguna/template',$data);
	}
	public function addprocessin()
	{
		$this->form_validation->set_rules('no_tiket', 'no_tiket', 'required');
		$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('tempat', 'tempat', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jk', 'jk', 'required');
		$this->form_validation->set_rules('golongan_darah', 'golongan_darah', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$id=$_POST['id_pegawai'];
		$cek=$this->db->query("select * from pegawai where id_pegawai='$id'")->num_rows();
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('entry/addindividu/'.$_POST['no_tiket']);
		}elseif($cek>0){
			$this->session->set_flashdata('error',"id_pegawai Sudah Digunakan");
			redirect('entry/addindividu/'.$_POST['no_tiket']);
		}else{
			$foto=$_FILES['gambar']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			if($_FILES['gambar']['name']!=""){
				$file='gambar'; //name pada input type file
				$filename 	= $_FILES['gambar']['name'];
				$dir		= "upload/";
				$dir1		= "uploads/";
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
			}else{
				$new_name="";
				$ext="";
			}
			$data=array(
				"id_pegawai"=>$_POST['id_pegawai'],
				"nama"=>strtoupper($_POST['nama']),
				"tempat_lahir"=>strtoupper($_POST['tempat']),
				"tanggal_lahir"=>$_POST['tanggal'],
				"jk"=>$_POST['jk'],
				"golongan_darah"=>$_POST['golongan_darah'],
				"alamat"=>strtoupper($_POST['alamat']),
				"pekerjaan"=>strtoupper($_POST['pekerjaan']),
				"kewarganegaraan"=>$_POST['kewarganegaraan'],
				"id_kategori"=>$_POST['kategori'],
				"id_tiket"=>$_POST['no_tiket'],
				"foto"=>$new_name.$ext,
				"status"=>1,
			);
			$this->db->insert('pegawai',$data);
			for ($i=0; $i < count($_POST['instansi']); $i++) { 
				$objek=array(
					"id_pegawai"=>$_POST['id_pegawai'],
					"id_instansi"=>$_POST['instansi'][$i],
				);
				$this->db->insert('instansi_pegawai', $objek);
			}
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('entry/detailkk/'.$_POST['no_tiket']);
		}
	}
	public function tiket($id)
	{
		$tiket=getKK($id);
		if($id==""){
			$this->session->set_flashdata('error',"Data Gagal Di Update");
			redirect('entry/detailkk/'.$tiket);
		}else{
			$data=array(
				"tiket"=>$id,
			);
			$this->db->where('id_tiket', $tiket);
			$this->db->update('tiket',$data);
			$this->session->set_flashdata('sukses', getnama($id)." Berhasil Di Jadikan Kepala Keluarga");
			redirect('entry/detailkk/'.$tiket);
		}
	}
	public function detailindividu($id)
	{
		$tiket=getKK($id);
		$data=array(
			"title"=>'Detail Individu||Detail Tiket||Entri Data',
			"menu"=>getmenu(),
			"aktif"=>"entry",
			"id"=>$id,
			"getrow"=>$this->db->where('id_pegawai', $id)->get('pegawai')->row_array(),
			"getklasifikasi"=>$this->M_entry->getKategori($id)->result(),
			"content"=>"entry/detailindividu.php",
		);
		$this->breadcrumb->append_crumb('Entri Data Tiket', site_url('entry'));
		$this->breadcrumb->append_crumb('Data Individu Tiket <i>'.getnamakk($tiket).'</i>', site_url('entry/detailkk/'.$tiket));
		$this->breadcrumb->append_crumb('Detail Individu <i>'.getnama($id).'</i>', site_url('entry'));
		$this->load->view('pengguna/template',$data);
	}
	public function editfile()
	{
		$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error', "Data Gagal Disimpan");
			redirect('entry/detailindividu/'.$_POST['id_pegawai']);
		}else{
			if($_FILES['gambar']['name']!=""){
				$stnk=$_FILES['gambar']['name'];
				$dir="upload/"; //tempat upload foto
				$dirs="uploads/"; //tempat upload foto
				$file='gambar'; //name pada input type file
				$new_name3='update'.date('YmdHis').$this->input->post('jabatan').$this->input->post('id_pegawai').'.pdf'; //name pada input type file
				$vdir_upload = $dir;
				$file_name=$_FILES[''.$file.'']["name"];
				$vfile_upload = $vdir_upload . $file;
				$tmp_name=$_FILES[''.$file.'']["tmp_name"];
				move_uploaded_file($tmp_name, $dirs.$file_name);
				$source_url3=$dir.$file_name;
				rename($dirs.$file_name,$dirs.$new_name3);
				if($this->input->post('gambar_lama', TRUE)!=""){
					unlink("uploads/".$this->input->post('gambar_lama', TRUE));
				}
			}else{
				$new_name3=$this->input->post('gambar_lama', TRUE);
			}
			$data=array(
				"id_jabatan"=>$_POST['jabatan'],
				"id_pegawai"=>$_POST['id_pegawai'],
				"file"=>$new_name3,
				"status"=>1
			);
			if($this->input->post('gambar_lama')==""){
				$this->db->insert('file', $data);
				$this->session->set_flashdata('sukses', "File Berhasil Disimpan");
				redirect('entry/detailindividu/'.$_POST['id_pegawai']);
			}else{
				$this->db->where('id_pegawai', $_POST['id_pegawai']);
				$this->db->where('id_jabatan', $_POST['jabatan']);
				$this->db->update('file', $data);
				$this->session->set_flashdata('sukses', "File Berhasil Diupdate");
				redirect('entry/detailindividu/'.$_POST['id_pegawai']);
			}
			
		}
	}
	public function hapusfile($id_pegawai,$jabatan,$file)
	{
		if($id_pegawai=="" or $jabatan=="" or $file==""){
			$this->session->set_flashdata('error', "File Gagal Dihapus");
			redirect('entry/detailindividu/'.$id_pegawai);
		}else{
			unlink("uploads/".$file);
			$this->db->where('id_pegawai', $id_pegawai);
			$this->db->where('id_jabatan', $jabatan);
			$this->db->delete('file');
			$this->session->set_flashdata('sukses', "File Berhasil Dihapus");
			redirect('entry/detailindividu/'.$id_pegawai);
		}
	}
	public function editindividu($id)
	{
		$tiket=getKK($id);
		$data=array(
			"title"=>'Edit Individu||Detail Tiket||Entri Data',
			"menu"=>getmenu(),
			"aktif"=>"entry",
			"getrow"=>$this->db->where('id_pegawai',$id)->get('pegawai')->row_array(),
			"id"=>$id,
			"content"=>"entry/editindividu.php",
		);
		$this->breadcrumb->append_crumb('Entri Data Tiket', site_url('entry'));
		$this->breadcrumb->append_crumb('Data Individu Tiket <i>'.getnamakk($tiket).'</i>', site_url('entry/detailkk/'.$tiket));
		$this->breadcrumb->append_crumb('Edit Individu <i>'.getnama($id).'</i>', site_url('entry'));
		$this->load->view('pengguna/template',$data);
	}
	public function editprocessin()
	{
		$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('tempat', 'tempat', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('jk', 'jk', 'required');
		$this->form_validation->set_rules('golongan_darah', 'golongan_darah', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$id=$_POST['id_pegawai'];
		$cek=$this->db->query("select * from pegawai where id_pegawai='$id'")->num_rows();
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('entry/editindividu/'.$_POST['id_pegawai']);
		}else{
			$foto=$_FILES['gambar']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			if($_FILES['gambar']['name']!=""){
				$file='gambar'; //name pada input type file
				$filename 	= $_FILES['gambar']['name'];
				$dir		= "upload/";
				$dir1		= "uploads/";
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
				unlink("uploads/".$_POST['fotohidden']);
			}else{
				$new_name=$_POST['fotohidden'];
				$ext="";
			}
			$data=array(
				"nama"=>strtoupper($_POST['nama']),
				"tempat_lahir"=>strtoupper($_POST['tempat']),
				"tanggal_lahir"=>$_POST['tanggal'],
				"jk"=>$_POST['jk'],
				"golongan_darah"=>$_POST['golongan_darah'],
				"alamat"=>strtoupper($_POST['alamat']),
				"pekerjaan"=>strtoupper($_POST['pekerjaan']),
				"kewarganegaraan"=>$_POST['kewarganegaraan'],
				"id_kategori"=>$_POST['kategori'],
				"foto"=>$new_name.$ext,
				"status"=>1,
			);
			$this->db->where('id_pegawai',$_POST['id_pegawai']);
			$this->db->update('pegawai',$data);
			$this->db->where('id_pegawai', $_POST['id_pegawai']);
			$this->db->delete('instansi_pegawai');
			for ($i=0; $i < count($_POST['instansi']); $i++) { 
				$objek=array(
					"id_pegawai"=>$_POST['id_pegawai'],
					"id_instansi"=>$_POST['instansi'][$i],
				);
				$this->db->insert('instansi_pegawai', $objek);
			}
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('entry/editindividu/'.$_POST['id_pegawai']);
		}
	}
	public function hapusindividu($id_pegawai)
	{
		$tiket=getKK($id_pegawai);
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
			"tiket"=>"",
		);
		$this->db->where('tiket', $id_pegawai);
		$this->db->update('tiket', $data);
		$this->session->set_flashdata('sukses', "Seluruh Data Individu Berhasil Dihapus");
		redirect('entry/detailkk/'.$tiket);
	}
	public function deadindividu($id_pegawai)
	{
		$tiket=getKK($id_pegawai);
		$data=array(
			"tiket"=>"",
		);
		$data2=array(
			"status"=>2,
		);
		$this->db->where('tiket', $id_pegawai);
		$this->db->update('tiket', $data);
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('pegawai', $data2);
		$this->session->set_flashdata('sukses', "Data Berhasil Dinonaktifkan");
		redirect('entry/detailkk/'.$tiket);
	}
	public function onindividu($id_pegawai)
	{
		$tiket=getKK($id_pegawai);
		$data2=array(
			"status"=>1,
		);
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('pegawai', $data2);
		$this->session->set_flashdata('sukses', "Data Berhasil Diaktifkan");
		redirect('entry/detailkk/'.$tiket);
	}
	public function all()
	{
		$data=array(
			"title"=>'Searching',
			"menu"=>getmenu(),
			"all"=>$this->db->query("SELECT * FROM pegawai 
									JOIN kategori ON kategori.id_kategori=pegawai.id_kategori")->result(),
			"aktif"=>"all",
			"content"=>"entry/all.php",
		);
		$this->breadcrumb->append_crumb('Searching', site_url('entry/all'));
		$this->load->view('pengguna/template',$data);
	}
	//////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////
	public function allkeluhan()
	{
		$data=array(
			"title"=>'Tiket Keluhan',
			"menu"=>getmenu(),
			"all"=>$this->db->query("SELECT * FROM keluhan 
									JOIN kategori,instansi ON kategori.id_keluhan=pegawai.id_keluhan")->result(),
			"aktif"=>"all",
			"content"=>"entry/all.php",
		);
		$this->breadcrumb->append_crumb('Searching', site_url('entry/all'));
		$this->load->view('pengguna/template',$data);
	}
}
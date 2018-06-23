<?php

class Modul extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_modul');
		//$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		no_access();
		//levelsuper();
	}
	public function index()
	{
		$data=array(
			"title"=>'Modul',
			"menu"=>getmenu(),
			"all"=>$this->db->get('modul')->result(),
			"aktif"=>"modul",
			"content"=>"modul/index.php",
		);
		$this->breadcrumb->append_crumb('Modul', site_url('modul'));
		$this->load->view('pengguna/template',$data);
		//$this->load->view('modul/addmodul', array('error' => ' ' ));
		/* if(isset ($_POST['upload_form'])){
			$config = [
					'upload_path' => './upload/',
					'allowed_types' =>'pdf|zip',
					'max_size' => '20000'
			];
			//membuat library upload
			$this -> load -> library ('upload', $config);
			if(this->upload-> do_upload()){
				$this -> load -> view ('upload_success_view', ['data' => $this->upload -> data()]);
			}
			else {
				$this -> load ->view ('Modul/index');
			}
		}
		else {
			$this -> load -> view ('Modul/index');
		} */
	}
	public function addmodul(){
		$data = $this->ksr_model->GetSurat('surat');
        $data = array ('data'=> $data);
        $this->load->view('admin/kontak', $data);
	}
	
	
	
	 public function editmodul($id)
	{
		
		$data=array(
			"title"=>'Edit Modul||Entri Data modul',
			"menu"=>getmenu(),
			//"all"=>$this->db->where('id_modul',$id)->get('modul')->row_array(),
			"aktif"=>"Modul",
			//"id"=>$id,
			"getrow"=>$this->db->where('id_modul',$id)->get('modul')->row_array(),
			"id"=>$id,
			"content"=>"modul/editmodul.php",
		);
		//$this->breadcrumb->append_crumb('Entri Data Modul', site_url('entry'));
		$this->breadcrumb->append_crumb('Entri Data Modul', site_url('modul'));
		$this->breadcrumb->append_crumb('Edit Data Modul', site_url('modul'));
		$this->load->view('pengguna/template',$data);
	} 
	public function editprocessin(){
		$this->form_validation->set_rules('id_modul', 'id_modul', 'required');
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		$id=$_POST['id_modul'];
		$cek=$this->db->query("select * from modul where id_modul='$id'")->num_rows();
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('modul/editmodul/');
		}else{
			$user_file=$_FILES['userfile']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			if($_FILES['userfile']['name']!=""){
				$user_file='userfile'; //name pada input type file
				$filename 	= $_FILES['userfile']['name'];
				$dir		= "upload_file/";
				$dir1		= "uploads/";
				$file		= 'userfile';
				$config = [
					'upload_path' => './upload/',
					'allowed_types' =>'pdf|zip',
					'max_size' => '20000'
				];
				$new_name='uploadfiless'.date('YmdHis').$_POST['id_modul']; //name pada input type file
				//$tipe 		= $_FILES['userfile']['type'];
				//$ukuran 	= $_FILES['userfile']['size'];
				$vdir_upload	= $dir;
				$file_name		= $_FILES[''.$file.'']["name"];
				$vfile_upload	= $vdir_upload.$file;
				$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
				move_uploaded_file ($tmp_file, $dir.$file_name);
				date_default_timezone_get('Asia/Jakarta');
				$source_url=$dir.$file_name;
				//$info=getimagesize($source_url);
				/* if ($ukuran < 300000 and $ukuran > 10000) {	
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
				$userfile = imagecreatefromjpeg($source_url);
				$ext='.jpeg';
				if (imagejpeg($userfile, $dir1.$new_name.$ext, $quality)){
					unlink($source_url);
				}else{
					unlink($source_url);
				}
			}else{
				$new_name="";
				$ext="";
			} */
			$ext='.pdf';
			$data=array(
				"id_modul"=>$_POST['id_modul'],
				"judul"=>strtoupper($_POST['judul']),
				"tanggal"=>strtoupper($_POST['tanggal']),
				"deskripsi"=>strtoupper($_POST['deskripsi']),
				"user_file"=>$new_name.$ext,
			);
			$this->db->update('modul',$data);
			/*for ($i=0; $i < count($_POST['instansi']); $i++) { 
				$objek=array(
					"id_pegawai"=>$_POST['id_pegawai'],
					"id_instansi"=>$_POST['instansi'][$i],
				);
				$this->db->insert('instansi_pegawai', $objek);
			}*/
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('modul/editmodul/');
		}
} 
		
	}
	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('Modul');
		}else{
			$this->db->where('id_modul', $id);
			$this->db->delete('modul');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('Modul');
		}
	}
	public function download($fileName = NULL) {
        if ($fileName) {
            $file = realpath ( "upload_file" ) . "\\" . $fileName;
            // check file exists
            if (file_exists ( $file )) {
                // get file content
                $data = file_get_contents ( $file );
                //force download
                force_download ( $fileName, $data );
            } else {
                // Redirect to base url
                redirect ( base_url () );
            }
        }
    }
	} ?> 
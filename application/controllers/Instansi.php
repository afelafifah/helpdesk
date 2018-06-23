<?php

class Instansi extends CI_Controller {
	function __construct(){

		parent::__construct();
		$this->load->helper('url');
		$config['tag_open'] = '<ul class="breadcrumb">';
		$config['tag_close'] = '</ul>';
		$config['li_open'] = '<li>';
		$config['li_close'] = '</li>';
		$config['divider'] = '<span class="divider"> » </span>';
		$this->breadcrumb->initialize($config);
		$this->load->model('M_klasifikasi');
		$this->load->helper('form');
		no_access();
		levelsuper();
	}
	public function index()
	{
		$data=array(
			"title"=>'Instansi',
			"menu"=>getmenu(),
			"all"=>$this->db->get('instansi')->result(),
			"aktif"=>"instansi",
			"content"=>"instansi/index.php",
		);
		$this->breadcrumb->append_crumb('Instansi', site_url('instansi'));
		$this->load->view('pengguna/template',$data);
	}
	public function add()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('instansi');
		}else{
			$data=array(
				"id_instansi"=>$_POST['id'],
				"instansi"=>$_POST['instansi'],
				"status"=>1,
			);
			$this->db->insert('instansi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('instansi');
		}
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Edit");
			redirect('instansi');
		}else{
			$data=array(
				"instansi"=>$_POST['instansi'],
			);
			$this->db->where('id_instansi', $_POST['id']);
			$this->db->update('instansi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('instansi');
		}
	}
	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('instansi');
		}else{
			$this->db->where('id_instansi', $id);
			$this->db->delete('instansi');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('instansi');
		}
	}
	public function detail($id)
	{
		$getrow=$this->M_klasifikasi->getrow($id)->row_array();
		$data=array(
			"title"=>'Detail||Instansi',
			"menu"=>getmenu(),
			"all"=>$this->db->where('id_instansi',$id)->get('jabatan_instansi')->result(),
			"aktif"=>"instansi",
			"jabatan"=>$getrow['instansi'],
			"id"=>$id,
			"content"=>"instansi/detail.php",
		);
		$this->breadcrumb->append_crumb('Instansi', site_url('instansi'));
		$this->breadcrumb->append_crumb('Jabatan Di Instansi <strong><i>'.$getrow['instansi'].'</i></strong>', site_url('instansi/detail/'.$id));
		$this->load->view('pengguna/template',$data);
	}
	public function addkategori($id)
	{
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		$getrow=$this->M_klasifikasi->getnum($_POST['jabatan'],$id)->num_rows();
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('instansi/detail/'.$id);
		}elseif($getrow>0){
			$this->session->set_flashdata('error',"Data Sudah Ada");
			redirect('instansi/detail/'.$id);
		}else{
			$data=array(
				"id_jabatan"=>$_POST['jabatan'],
				"id_instansi"=>$id,
				"status"=>1,
			);
			$this->db->insert('jabatan_instansi',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('instansi/detail/'.$id);
		}
	}
	public function hapuskategori($id_jabatan,$id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('instansi/detail/'.$id);
		}else{
			$data=array(
				"status"=>1
			);
			$this->db->where('id_instansi',$id);
			$this->db->where('id_jabatan',$id_jabatan);
			$this->db->delete('jabatan_instansi');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('instansi/detail/'.$id);
		}
	}
}

<?php

class Jabatan extends CI_Controller {
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
			"title"=>'Jabatan',
			"menu"=>getmenu(),
			"all"=>$this->db->get('jabatan')->result(),
			"aktif"=>"jabatan",
			"content"=>"jabatan/index.php",
		);
		$this->breadcrumb->append_crumb('Jabatan', site_url('jabatan'));
		$this->load->view('pengguna/template',$data);
	}
	public function add()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('Jabatan');
		}else{
			$data=array(
				"id_jabatan"=>$_POST['id'],
				"jabatan"=>$_POST['jabatan'],
				"status"=>1,
			);
			$this->db->insert('jabatan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Jabatan');
		}
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Edit");
			redirect('Jabatan');
		}else{
			$data=array(
				"jabatan"=>$_POST['jabatan'],
			);
			$this->db->where('id_jabatan', $_POST['id']);
			$this->db->update('jabatan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('Jabatan');
		}
	}
	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('Jabatan');
		}else{
			$this->db->where('id_jabatan', $id);
			$this->db->delete('jabatan');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('Jabatan');
		}
	}
}

<?php

class Keluhan extends CI_Controller {
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
			"title"=>'Keluhan',
			"menu"=>getmenu(),
			"all"=>$this->db->get('keluhan')->result(),
			"aktif"=>"keluhan",
			"content"=>"keluhan/index.php",
		);
		$this->breadcrumb->append_crumb('Keluhan', site_url('keluhan'));
		$this->load->view('pengguna/template',$data);
	}
	public function add()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('keluhan', 'keluhan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('Keluhan');
		}else{
			$data=array(
				"id_keluhan"=>$_POST['id'],
				"keluhan"=>$_POST['keluhan'],
				"status"=>1,
			);
			$this->db->insert('keluhan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
			redirect('Keluhan');
		}
	}
	public function edit()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('keluhan', 'keluhan', 'required');
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Edit");
			redirect('Keluhan');
		}else{
			$data=array(
				"keluhan"=>$_POST['keluhan'],
			);
			$this->db->where('id_keluhan', $_POST['id']);
			$this->db->update('keluhan',$data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
			redirect('Keluhan');
		}
	}
	public function hapus($id)
	{
		if($id==""){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
			redirect('Keluhan');
		}else{
			$this->db->where('id_keluhan', $id);
			$this->db->delete('keluhan');
			$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
			redirect('Keluhan');
		}
	}
}

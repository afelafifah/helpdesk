<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Download extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}
 
	public function index(){		
		$this->load->view('modul/index');
	}
 
	public function lakukan_download(){
		
		force_download('user_file',$user_file);
	}	
 
}
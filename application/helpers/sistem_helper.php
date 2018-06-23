<?php 
function in_access()
{
    $ci=& get_instance();
    if($ci->session->userdata('user')){
        redirect('welcome');
    }
}
function no_access()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('user')){
        redirect('login');
    }
}
function menuaktif($aktif,$menu){	
	if($aktif==$menu){
		return "active";
	}else{
		return "";
	}
}
function getmenu(){	
    $CI =& get_instance();
	if($CI->session->userdata('level')==1){
        return "menu.php";
    }else{
        return "menuadmin.php";
    }
}
function levelsuper(){ 
    $CI =& get_instance();
    if($CI->session->userdata('level')!=1){
        $CI->session->set_flashdata('error', "Anda Tidak Memiliki Akses Pada Halaman Tersebut");
        redirect('Welcome');
    }
}
function getId($tabel,$id)
{
	$ci=& get_instance();
    $q = $ci->db->query("select MAX(".$id.") as kd_max from ".$tabel."");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%09s", $tmp);
        }
    }
    else
    {
        $kd = "000000001";
    }
    return $kd;
}
function getIdTiket($tabel,$id)
{
	$ci=& get_instance();
    $q = $ci->db->query("select MAX(".$id.") as kd_max from ".$tabel."");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%06s", $tmp);
        }
    }
    else
    {
        $kd = "000001";
    }
    return $kd;
}
function getnumkat($id)
{
	$ci=& get_instance();
    $q = $ci->db->query("select * from jabatan_instansi where id_instansi='$id'")->num_rows();
    return $q;
}
function getnama($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from pegawai where id_pegawai='$id'")->row_array();
    return $q['nama'];
}
function getfoto($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from pegawai where id_pegawai='$id'")->row_array();
    return $q['foto'];
}
function getmodul($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from modul where id_modul='$id'")->row_array();
    return $q['modul'];
}
function getuserfile($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from modul where id_modul='$id'")->row_array();
    return $q['userfile'];
}
function getnamakk($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tiket where id_tiket='$id'")->row_array();
    return $q['no_tiket'];
}
function getnamatiket($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from pegawai where id_pegawai='$id'")->row_array();
    return $q['id_pegawai'];
}
function cekKK($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from tiket where tiket='$id'")->num_rows();
    return $q;
}
function getKK($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from pegawai where id_pegawai='$id'")->row_array();
    return $q['id_tiket'];
}
function getTiket($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from keluhan where id_keluhan='$id'")->row_array();
    return $q['id_pegawai'];
}
function getnamaagama($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from kategori where id_kategori='$id'")->row_array();
    return $q['kategori'];
}
function getnamaklasifikasi($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from instansi where id_instansi='$id'")->row_array();
    return $q['instansi'];
}
function getfile($id,$id_pegawai)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from file where id_jabatan='$id' and id_pegawai='$id_pegawai'")->num_rows();
    return $q;
}
function getnamafile($id,$id_pegawai)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from file where id_jabatan='$id' and id_pegawai='$id_pegawai'")->row_array();
    return $q['file'];
}
function select($id,$id2)
{
    if($id==$id2){
        return "selected";
    }
}
function select2($instansi,$id_pegawai)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from instansi_pegawai where id_instansi='$instansi' and id_pegawai='$id_pegawai'")->num_rows();
    if($q>0){
        return "selected";
    }
}
function getnamains($nama)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from desa")->row_array();
    return $q[$nama];
    
}
function getjumagama($kategori)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from pegawai where id_kategori='$kategori'")->num_rows();
    return $q;
    
}
function getjumstatus($s)
{
    $ci=& get_instance();
    $q = $ci->db->query("select * from pegawai where status='$s'")->num_rows();
    return $q;
    
}
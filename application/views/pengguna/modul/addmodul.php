<?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-pencil7"></i> Edit Modul</i></h5>
  </div>
  <?php echo form_open_multipart('Modul/addprocessin'); ?> 
  <div class="panel-body">
   <div class="form-group">
    <label class='col-md-3'>ID Modul</label>
    <div class='col-md-9'><input type="text" name="id_modul" autocomplete="off"  required placeholder="Masukkan ID Modul" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Judul Modul</label>
    <div class='col-md-9'><input type="text" name="judul" autocomplete="off"  required placeholder="Masukkan Judul Modul" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Tanggal Modul</label>
    <div class='col-md-9'><input name="tanggal" placeholder="Pilih Tanggal" required class="form-control datepicker"></textarea></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Deskripsi Modul</label>
    <div class='col-md-9'><textarea type="text" placeholder="Deskripsi Modul" name="deskripsi"  class="form-control"> </textarea></div>
  </div>
  <br>
  <br>
   <div class="form-group">
    <label class='col-md-3'>Upload File</label>
    <div class='col-md-9'><input type="file" name="userfile"  autocomplete="off" class="form-control" ></div>
  </div>
  <br>
  <br>
  </div>
   <div class="panel-footer">
    <br>
    <div class="row">
      <center><button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button></center>
    </div>
    <br>
   </div>
   <?php echo form_close(); ?>
</div>
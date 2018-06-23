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
    <h5 class="panel-title"><i class="icon-pencil7"></i> Tambah Data Keluhan</i></h5>
  </div>
  <?php echo form_open_multipart('User_keluhan/addprocessin'); ?>
  <div class="panel-body">
   <div class="form-group">
    <label class='col-md-3'>No Tiket Keluhan</label>
    <div class='col-md-9'><input type="text" name="id_keluhan" autocomplete="off" required placeholder="Masukkan ID_Keluhan" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Deskripsi Keluhan</label>
    <div class='col-md-9'><textarea name="keluhan" required class="form-control"></textarea></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Foto</label>
    <div class='col-md-9'><input type="file" name="gambar" accept="image/jpeg" autocomplete="off" class="form-control" ></div>
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
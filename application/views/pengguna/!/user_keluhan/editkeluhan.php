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
    <h5 class="panel-title"><i class="icon-pencil7"></i> Edit Data Tiket Keluhan</h5>
  </div>
  <?php echo form_open('User_keluhan/editkeluhanproses'); ?>
  <input type="hidden" value="<?php echo $id; ?>" name="id">
  <input type="hidden" value="<?php echo $getrow['foto']; ?>" name="fotohidden">
  <div class="panel-body">
    <div class="form-group">
      <label class='col-md-3'>ID Tiket Keluhan</label>
      <div class='col-md-9'><input type="text" name="id_keluhan" readonly value="<?php echo $getrow['id_keluhan'] ;?>" autocomplete="off" required placeholder="Masukkan No Tiket" class="form-control" ></div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class='col-md-3'>Deskripsi Keluhan</label>
      <div class='col-md-9'><input type="text-area" name="keluhan" value="<?php echo $getrow['keluhan'] ;?>" autocomplete="off" required placeholder="Masukkan Deskripsi Keluhan" class="form-control" ></div>
    </div>
    <br>
    <br>
<label class='col-md-3'>Foto</label>
  <div class='col-md-9'>
    <img src="<?php echo base_url('uploadkeluhan/'.$getrow['foto']); ?>" style="width:80px;height:110px;">
  </div>
  <?php echo br(6); ?>
  <div class="form-group">
    <label class='col-md-3'>Foto(Baru)</label>
    <div class='col-md-9'><input type="file" name="gambar" accept="image/jpeg" autocomplete="off" class="form-control" ></div>
  </div>
  <br>
  <br>
    <br>
    <br>
  </div>
   <div class="panel-footer">
   <br>
      <div class="row">
        <center><button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button></center>
      </div>
    <br>
   </div>
   <?php echo form_close(); ?>
</div>
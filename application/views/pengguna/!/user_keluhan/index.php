<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button>
<?php echo br(2); ?>
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
    <h5 class="panel-title"><i class="icon-sphere"></i> Keluhan</h5>
  </div>
  <div class="panel-body">
   <table class="table table-bordered datatable-columns">
      <thead>
          <tr>
              <th>Nomor</th>
			  <th>ID Tiket</th>
              <th>Deskripsi Keluhan</th>
			  <th class="never"></th>
			  <th>Foto</th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($all as $row): $no++; ?>
            <tr>
				<td></td>
				<td><?php echo $row->id_keluhan; ?></td>
				<td><?php echo $row->keluhan; ?></td>
				<td><?php echo $no; ?></td>
				<!--<td><?php echo "<img src='".base_url().'uploads/'.$row->foto."' width=80px; height=110px; class=img4;>"?></td>-->
				<td><img src="<?php echo base_url('uploadkeluhan/'.$row->foto); ?>" style="width:80px;height:110px;" class='img4'></td>
				<td>
				<center>
                    <a href="<?php echo site_url('User_keluhan/editkeluhan/'.$row->id_keluhan); ?>" class="btn btn-info btn-xs" data-popup="tooltip" data-original-title="Edit Data" data-placement="top"><i class="icon-pencil5"></i></a>
                    <a href="<?php echo site_url('User_keluhan/hapus/'.$row->id_keluhan); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="icon-x"></i></a>
                  </center>
                </td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div id="modal_theme_primary" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('user_keluhan/addkeluhan'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><strong>Tambah Data</strong></h6>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class='col-md-3'>ID Tiket Keluhan</label>
            <div class='col-md-9'><input type="text" name="id_keluhan" value="<?php echo getidtiket('keluhan','id_keluhan'); ?>" readonly placeholder="Masukkan ID Keluhan" class="form-control" ></div>
          </div>
		 <br>
		 <div class="form-group">
            <label class='col-md-3'>Deskripsi Keluhan <span class="field-required">*</span></label>
            <div class='col-md-9'><input type="text" name="keluhan" autocomplete="off" required placeholder="Masukkan Keluhan" id="keluhan" class="form-control" ></div>
          </div>
          <br>
		  <div class="form-group">
			<label class='col-md-3'>Foto <span class="field-required">*</span></label>
			<div class='col-md-9'><input type="file" name="foto" accept="image/jpeg" id="foto" autocomplete="off" class="form-control" ></div>
 		  </div>
		  <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>
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
    <h5 class="panel-title"><i class="icon-pencil7"></i> Edit Data Individu <b><i><?=getnama($id);?></i></b></h5>
  </div>
  <?php echo form_open_multipart('Entry/editprocessin'); ?>
  <input type="hidden" value="<?php echo $id; ?>" name="nikhidden">
  <input type="hidden" value="<?php echo $getrow['foto']; ?>" name="fotohidden">
  <div class="panel-body">
   <div class="form-group">
    <label class='col-md-3'>ID_Pegawai</label>
    <div class='col-md-9'><input type="text" readonly name="id_pegawai" value="<?php echo $getrow['id_pegawai']; ?>" autocomplete="off" required placeholder="Masukkan ID_Pegawai" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Nama</label>
    <div class='col-md-9'><input type="text" name="nama" value="<?php echo $getrow['nama']; ?>" autocomplete="off" required placeholder="Masukkan Nama Lengkap" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Tempat Lahir</label>
    <div class='col-md-9'><input type="text" name="tempat" value="<?php echo $getrow['tempat_lahir']; ?>" autocomplete="off" required placeholder="Masukkan Tempat Lahir" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Tanggal Lahir</label>
    <div class='col-md-9'><input type="text" name="tanggal" value="<?php echo $getrow['tanggal_lahir']; ?>" autocomplete="off" required placeholder="Masukkan Tanggal Lahir" class="form-control datepicker" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Jenis Kelamin</label>
    <div class='col-md-2'>
      <input type="radio" required value="Laki-laki" <?php if($getrow['jk']=='Laki-laki'){echo "checked";} ?> name="jk"> Laki Laki
    </div>
    <div class='col-md-3'>
      <input type="radio" required value="Perempuan" <?php if($getrow['jk']=='Perempuan'){echo "checked";} ?> name="jk"> Perempuan
    </div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Golongan Darah</label>
    <div class='col-md-9'>
      <select data-placeholder="Pilih Golongan Darah" name="golongan_darah" required class="select-clear">
        <option></option>
        <option value="A" <?php if($getrow['golongan_darah']=='A'){echo "selected";} ?>>A</option>
        <option value="B" <?php if($getrow['golongan_darah']=='B'){echo "selected";} ?>>B</option>
        <option value="AB" <?php if($getrow['golongan_darah']=='AB'){echo "selected";} ?>>AB</option>
        <option value="O" <?php if($getrow['golongan_darah']=='O'){echo "selected";} ?>>O</option>
      </select>
    </div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Alamat</label>
    <div class='col-md-9'><textarea name="alamat" required class="form-control"><?php echo $getrow['alamat']; ?></textarea></div>
  </div>
  <br>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Pekerjaan</label>
    <div class='col-md-9'><input type="text" name="pekerjaan" value="<?php echo $getrow['pekerjaan']; ?>" autocomplete="off" placeholder="Masukkan Pekerjaan" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Kewarganegaraan</label>
    <div class='col-md-9'><input type="text" name="kewarganegaraan" value="<?php echo $getrow['kewarganegaraan']; ?>" autocomplete="off" required placeholder="Masukkan Kewarganegaraan" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Kategori</label>
    <div class='col-md-9'>
      <select data-placeholder="Pilih Kategori" name="kategori" required class="select-clear">
        <?php $kategori=$this->db->get('kategori')->result(); ?>
        <option></option>
        <?php 
           $no=0; foreach($kategori as $r): $no++;
           echo '<option value="'.$r->id_kategori.'" '.select($getrow['id_kategori'],$r->id_kategori).'>'.$r->kategori.'</option>';
           endforeach;
        ?>
      </select>
    </div>
  </div>
  <br>
  <br>
  <label class='col-md-3'>Foto</label>
  <div class='col-md-9'>
    <img src="<?php echo base_url('uploads/'.$getrow['foto']); ?>" style="width:80px;height:110px;">
  </div>
  <?php echo br(6); ?>
  <div class="form-group">
    <label class='col-md-3'>Foto(Baru)</label>
    <div class='col-md-9'><input type="file" name="gambar" accept="image/jpeg" autocomplete="off" class="form-control" ></div>
  </div>
  <br>
  <br>
  <div class="form-group">
    <label class='col-md-3'>Instansi</label>
    <div class='col-md-9'>
      <select data-placeholder="Pilih Instansi" multiple name="instansi[]" required class="select-clear">
        <?php $instansi=$this->db->get('instansi')->result(); ?>
        <option></option>
        <?php 
           $no=0; foreach($instansi as $r): $no++;
           echo '<option value="'.$r->id_instansi.'" '.select2($r->id_instansi,$id).'>'.$r->instansi.'</option>';
           endforeach;
        ?>
      </select>
    </div>
  </div>
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
<a href="<?php echo site_url('User_keluhan/addkeluhan/'); ?>" class="btn btn-primary btn-sm"><i class="icon-file-plus"></i> Tambah </a>
<?php 
echo br(2);
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
    <h5 class="panel-title"><i class="icon-pencil7"></i> Detail Keluhan Di Tiket</h5>
  </div>
  <div class="panel-body">
    <table class="table table-bordered datatable-columns">
      <thead>
          <tr>
              <th>No</th>
              <th>ID Keluhan</th>
              <th>Keluhan</th>
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
                <td><img src="<?php echo base_url('uploads/'.$row->foto); ?>" style="width:80px;height:110px;" class='img4'></td>
				<td>
                  <center>
                    <a href="<?php echo site_url('user_keluhan/detailkeluhan/'.$row->id_keluhan); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a>
                    <!--<a href="<?php echo site_url('entry/editindividu/'.$row->id_pegawai); ?>" class="btn btn-info btn-xs tooltips" data-popup="tooltip" data-original-title="Edit Data" data-placement="top"><i class="icon-pencil5"></i></a>
                    <a href="<?php echo $site; ?>" onclick="return confirm('Anda Yakin Merubah Status Data Ini');" class="btn btn-<?=$class;?> btn-xs tooltips" data-popup="tooltip" data-original-title="<?php echo $teks; ?>" data-placement="top"><i class="icon-<?=$icon;?>"></i></a>
                    <a href="<?php echo site_url('entry/hapusindividu/'.$row->id_pegawai); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="icon-x"></i></a>-->
                  </center>
                </td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
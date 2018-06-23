<a href="<?php echo site_url('Modul/addmodul/'); ?>" class="btn btn-primary btn-sm"><i class="icon-file-plus"></i> Tambah </a>
<?php echo br(2); ?>
<?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-success"><strong>Sukses! </strong> 
<?=$data;?></div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-sphere"></i> Modul</h5>
  </div>
  <div class="panel-body">
   <table class="table table-bordered datatable-columns">
      <thead>
          <tr>
              <th>Nomor</th>
			  <th>ID Modul</th>
			  <th>Judul Modul</th>
			  <th class="never"></th>
			  <th>Tanggal</th>
			  <th>Deskripsi</th>
			  <th>File</th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($all as $row): $no++; ?>
            <tr>
                <td></td>
                <td><?php echo $row->id_modul; ?></td>
				<td><?php echo $row->judul; ?></td>
				<td><?php echo $no; ?></td>
				<td><?php echo $row->tanggal; ?></td>
				<td><?php echo $row->deskripsi; ?></td>
				<td> <a href="<?php echo base_url()."./upload_file/".$row->user_file;?>"><?php echo $row->user_file; ?></td>
				</td>
                <td>
                  <center>
                    <a href="<?php echo site_url('Modul/editmodul/'.$row->id_modul); ?>" class="btn btn-info btn-xs tooltips" data-popup="tooltip" data-original-title="Edit Data" data-placement="top"><i class="icon-pencil5"></i></a>
                    <a href="<?php echo site_url('Modul/hapus/'.$row->id_modul); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="icon-x"></i></a>
                  </center>
                </td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
 
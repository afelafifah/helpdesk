<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-file-eye2"></i> Searching</h5>
  </div>
  <div class="panel-body">
   <table class="table table-bordered datatable-columns">
       <thead>
        <tr>
            <th>No</th>
            <th>ID_Pegawai</th>
            <th width="100">No Tiket</th>
            <th></th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>JK</th>
            <th>Kategori</th>
            <th>Status</th>
            <th><center>Opsi</center></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; foreach($all as $row): $no++;?>
        <tr>
          <td></td>
          <td><?php echo $row->id_pegawai; ?></td>
          <td><?php echo getnamakk($row->id_tiket); ?></td>
          <td><?php echo $no; ?></td>
          <td><?php echo $row->nama; ?></td>
          <td><?php echo $row->tanggal_lahir; ?></td>
          <td><?php echo $row->jk; ?></td>
          <td><?php echo $row->kategori; ?></td>
          <td><?php if($row->status==1){echo 'Hidup';}else{'Meninggal';} ?></td>
          <td>
            <center>
              <a href="<?php echo site_url('entry/detailindividu/'.$row->id_pegawai); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a>
            </center>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
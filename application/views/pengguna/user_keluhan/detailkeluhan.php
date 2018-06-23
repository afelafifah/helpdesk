<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-pencil7"></i> Detail Keluhan <b><i><?=getnama($id);?></i></b></h5>
  </div>
  <div class="panel-body">
    <div class="col-md-6">
      <table class="table table-bordered">
          <tr>
              <th width="180">ID_Keluhan</th>
              <td><?php echo $all['id_keluhan']; ?></td>
          </tr>
          <tr>
              <th>Nama</th>
              <td><?php echo $all['keluhan']; ?></td>
          </tr>
           <tr>
              <th>Foto</th>
              <td><img src="<?php echo base_url('uploads/'.$all['foto']); ?>" alt="Belum Di Update" class='img4'></td>
          </tr>
      
    
  </div>
</div>
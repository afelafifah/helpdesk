<div class="sidebar sidebar-main">
  <div class="sidebar-content">
    <div class="sidebar-user">
    </div>
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
          <li class="<?php echo menuaktif('dashboard',$aktif); ?>"><a href="<?php echo base_url(); ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
          <li>
            <a href="#"><i class="icon-stack2"></i> <span>Master Data</span></a>
            <ul>
              <li class="<?php echo menuaktif('kategori',$aktif); ?>"><a href="<?php echo site_url('Kategori'); ?>"><i class="icon-sphere"></i>Kategori</a></li>
              <li class="<?php echo menuaktif('jabatan',$aktif); ?>"><a href="<?php echo site_url('Jabatan'); ?>"><i class="icon-pencil6"></i>Jabatan</a></li>
            </ul>
          </li>
          <li class="<?php echo menuaktif('instansi',$aktif); ?>"><a href="<?php echo site_url('Instansi'); ?>"><i class="icon-upload7"></i> <span>Instansi</span></a></li>
			<li class="<?php echo menuaktif('keluhan',$aktif); ?>"><a href="<?php echo site_url('User_keluhan'); ?>"><i class="icon-sphere"></i>Tiket</a></li><li>      
				 <a href="#"><i class="icon-people"></i> <span>Pegawai</span></a>
            <ul>
              <li class="<?php echo menuaktif('entry',$aktif); ?>"><a href="<?php echo site_url('Entry'); ?>"><i class="icon-pencil7"></i> <span>Data Pegawai</span></a></li>
              <li class="<?php echo menuaktif('laporan',$aktif); ?>"><a href="<?php echo site_url('Laporan'); ?>"><i class="icon-book"></i> <span>Laporan</span></a></li>
              <li class="<?php echo menuaktif('all',$aktif); ?>"><a href="<?php echo site_url('Entry/all'); ?>"><i class="icon-file-eye2"></i> <span>Searching</span></a></li>
            </ul>
          </li>
		  <li class="<?php echo menuaktif('modul',$aktif); ?>"><a href="<?php echo site_url('modul'); ?>"><i class="icon-upload7"></i> <span>Modul</span></a></li>
          <li>
          <li class="<?php echo menuaktif('user',$aktif); ?>"><a href="<?php echo site_url('User'); ?>"><i class="icon-collaboration"></i> <span>Manajemen Level</span></a></li>
          <li class="<?php echo menuaktif('ins',$aktif); ?>"><a href="<?php echo site_url('Ins'); ?>"><i class="icon-city"></i> <span>Manajemen Desa</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
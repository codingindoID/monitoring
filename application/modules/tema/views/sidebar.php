
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url().'assets/'?>dist/img/app.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('ses_username') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>

      </div>
    </div>
    <!-- /.search form -->
    <form action="<?php echo site_url('search') ?>" method="post" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="cari" class="form-control" placeholder="cari kunjungan. . .">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header" style="color:black">MENU UTAMA</li>
      <li>
        <a href="<?php echo site_url('dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-home fa-black"></i>
          <span>Monitoring</span>
        </a>
        <ul id="menu_surat" class="treeview-menu">
          <li><a href="<?php echo site_url('beranda') ?>"><i class="fa  fa-exchange"></i>Hari ini</a></li>
          <li><a href="<?php echo site_url('beranda/filter') ?>"><i class="fa fa-filter"></i>filter</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo site_url('master/form_input_kendaraan') ?>">
          <i class="fa fa-check"></i> <span>Register</span>
        </a>
      </li>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="color:black">ADMIN</li>
      </ul>
      <li>
        <a href="<?php echo site_url('master/cetak_vgp') ?>">
          <i class="fa fa-print"></i> <span>Cetak VGP</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gear fa-black"></i>
          <span>Master</span>
        </a>
        <ul id="menu_master" class="treeview-menu">
          <li><a href="<?php echo site_url('master/perusahaan/') ?>"><i class="fa fa-industry"></i>Master Data Perusahaan</a></li>
          <!--           <li><a href="<?php echo site_url('master/driver/') ?>"><i class="fa fa-user"></i>Master Data Driver</a></li> -->
          <li><a href="<?php echo site_url('master/merek/') ?>"><i class="fa fa-car"></i>Master Merek Kendaraan</a></li>
          <li><a href="<?php echo site_url('master/data_kendaraan/') ?>"><i class="fa fa-tasks"></i>Master Data Kendaraan</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

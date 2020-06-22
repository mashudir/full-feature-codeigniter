 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('./assets/img/'.$this->session->userdata("FOTO")) ?>" class="img-rounded" alt="User Image" >
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('NAMA') ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?php echo base_url('admin') ?>">
            <i class="fa fa-users"></i> <span>Pegawai</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('chartpegawai') ?>">
            <i class="fa fa-bar-chart"></i> <span>Chart Indeks Kinerja</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('masteriki') ?>">
            <i class="fa fa-check"></i> <span>Master Indeks Kinerja</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('masterlogbook') ?>">
            <i class="fa fa-book"></i> <span>Master Kegiatan Logbook</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
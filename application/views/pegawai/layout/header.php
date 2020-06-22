<body class="hold-transition skin-blue layout-top-nav">

    <header class="main-header">
      <nav class="navbar navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <a href="../../index2.html" class="navbar-brand"><b>SIMETRIS ONLINE</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url('pegawai/profile') ?>">PROFILE</a></li>
              <li><a href="<?php echo base_url('pegawai/logbook') ?>">LOGBOOK</a></li>
              <li><a href="<?php echo base_url('pegawai/iki') ?>">IKI PEGAWAI</a></li>
              <li><a href="<?php echo base_url('auth/logout') ?>">LOGOUT</a></li>
            </ul>
          </div>
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
<br>
<br>
  <div class="content-wrapper">
      <div class="container">
        <div class="box box-default">
          <div class="box-header">
            <h3 class="text-info"><?php echo strtoupper($title) ?></h3>
          </div>

          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #7db8b8; min-width: 100px">NAMA</font></span>
                  <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata('NAMA') ?>" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #7db8b8; min-width: 100px">NIP</font></span>
                  <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata('NIP') ?>" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="input-group input-group-sm mb-3">
                  <span class="input-group-addon" id="basic-addon1" style="background-color: #7db8b8; min-width: 100px">UNIT</font></span>
                  <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata('MSU_NAMA') ?>" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      
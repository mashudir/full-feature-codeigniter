<section class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-widget widget-user-2">
          <div class="widget-user-header bg-light-blue">
            <div class="widget-user-image">
              <img class="img-rounded" id="pg-avatar" src="<?php echo base_url('assets/img/'.$this->session->userdata('iden_foto')) ?>" alt="User Avatar">
            </div>
            <h5 class="widget-user-desc" id="pg-name"><?php echo $this->session->userdata('iden_nama') ?></h5>
            <h5 class="widget-user-desc">=================</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a>NIK <span class="pull-right badge bg-blue" id="pg-nik"><?php echo $this->session->userdata('iden_nip') ?></span></a></li>
              <li><a>Jabatan <span class="pull-right badge bg-aqua" id="pg-jab"><?php echo $this->session->userdata('iden_jabatan') ?></span></a></li>
            </ul>
          </div>
        </div>
        <!-- <div class="box box-widget bg-light-blue">
          <div class="widget-user-header bg-light-blue text-center">
            <h5 class="widget-user-desc">Rentang penilaian 0-100</h5>
          </div>
        </div> -->
      </div>
      <div class="col-md-9">
        <div class="box box-info">
          <div class="box-header with-border">
            <div class="box-header">
              <div class="modal-content">
                <div class="modal-header text-center" style="background-color: lightblue">
                  <h4 class="modal-title w-100 font-weight-bold"><b>PENILAIAN</b></h4>

                </div>
                <?php if (date('d') < '10'){?>
                  <p>Jadwal penilaian mulai tanggal 20 setiap bulan</p>
                <?php }elseif ($this->data['cek'] == TRUE) { ?>
                  <p>Pegawai ini sudah dilakukan penilaian</p>
                <?php }else{ ?>
                  <p id="pesan" class="text-center text-danger"></p>
                <form actionrole="form" onSubmit="return penilaian()" method="POST" enctype="multipart/form-data" id="formpenilaian">
                  <input type="hidden" name="idpegawai" id="idpegawai" value="<?php echo $this->session->userdata['iden_kode'] ?>">
                  <div class="modal-body mx-3">
                    <div class="row">
                      <div class="col-md-6">
                        <h4><b>Perilaku</b></h4>
                        <?php foreach ($this->data['perilaku'] as $key):?>
                          <div class="md-form mb-5">
                              <p><?php echo $key['MST_IKI_INDIKATOR'] ?></p>
                            <div class='input-group'>
                              <input type="hidden" name="idperilaku[]" value="<?php echo $key['MST_IKI_KODE'] ?>">
                              <input type='number' name="perilaku[]" class="form-control" placeholder="max:<?php echo $key['MST_IKI_TARGET']?>" min="0" max="<?php echo $key['MST_IKI_TARGET'] ?>" required="" />
                              <span class="input-group-addon">
                                <span class="fa fa-user"></span>
                              </span>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                      <div class="col-md-6">
                        <h4><b>Kualitas</b></h4>
                        <?php foreach ($this->data['kualitas'] as $key): ?>
                            <div class="md-form mb-5">
                            <p><?php echo $key['MST_IKI_INDIKATOR'] ?></p>
                          <div class='input-group'>
                            <input type="hidden" name="idkualitas[]" value="<?php echo $key['MST_IKI_KODE'] ?>">
                            <input type='number' name="kualitas[]" class="form-control" placeholder="max:<?php echo $key['MST_IKI_TARGET']?>" min="0" max="<?php echo $key['MST_IKI_TARGET']?>" required="" />
                            <span class="input-group-addon">
                              <span class="fa fa-user"></span>
                            </span>
                          </div>
                        </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-info" id="btn-penilaian">SIMPAN <i class="fa fa-paper-plane-o ml-1"></i></button>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>

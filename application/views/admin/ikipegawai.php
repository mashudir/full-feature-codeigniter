<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-widget widget-user-2">
          <div class="widget-user-header bg-light-blue">
            <div class="widget-user-image">
              <img class="img-rounded" src="<?php echo base_url('assets/img/').$this->session->userdata('iden_foto') ?>" alt="User Avatar">
            </div>
            <h5 class="widget-user-desc"><?php echo $this->session->userdata('iden_nama') ?></h5>
            <h6 class="widget-user-desc">=================</h6>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a>NIK <span class="pull-right badge bg-blue"><?php echo $this->session->userdata('iden_nip') ?></span></a></li>
              <li><a>Jabatan <span class="pull-right badge bg-aqua"><?php echo $this->session->userdata('iden_jabatan') ?></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="box box-default print">
          <div class="box-header">
            <div class="row">
              <div class="col-md-8">
                <form method="post" class="form-inline form-xs" action="<?php echo site_url('Ikipegawai/sortByMonth') ?>" enctype="multipart/form-data">
                  <span class="label label-default" style="background-color: #d8f5b5"><b>Filter </b></span>
                  <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="month" id="datestart" class="form-control input-sm" data-date-format="YYYY-MM" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m") ?>" />
                    <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </span>
                  </div>
                  <div class="btn-group btn-group-xs" role="group">
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
                  </div>
                </form>
              </div>
              <div class="col-md-2">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                  <div class="btn-group btn-group-xs" role="group">
                    <a onclick="window.location='<?php echo base_url('Ikipegawai/page/').$this->session->userdata('iden_kode') ?>'" type="button" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i>   Refresh</a>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                  <div class="btn-group btn-group-xs" role="group">
                    <a onclick="print()" type="button" class="btn btn-success"><i class="glyphicon glyphicon-print"></i>   Cetak</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box box-info">
          <div class="box-header with-border">
            <div class="box-header">
              <table border="1" >
                <thead>
                  <tr>
                    <th width="2%" class="text-center" style="background-color: lightblue"></th>
                    <th width="40%" class="text-center" style="background: lightblue">INDIKATOR YANG DINILAI</th>
                    <th width="35%" class="text-center" style="background: lightblue">DEFINISI OPERASIONAL</th>
                    <th width="6%" class="text-center" style="background: lightblue">TARGET</th>
                    <th width="7%" class="text-center" style="background: lightblue">CAPAIAN</th>
                    <th width="5%" class="text-center" style="background: lightblue">BOBOT (%)</th>
                    <th width="5%" class="text-center" style="background: lightblue">NILAI HASIL KINERJA</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-bold" bgcolor="lightgrey">A.</td>
                    <td class="text-bold" colspan="6" bgcolor="lightgrey">KUANTITAS</td>
                  </tr>
                  <?php
                  $i=1;
                  $data = $this->data['kuantitas'];
                  if ($data != null) {?>
                    <tr>
                      <td class="text-center"><?php echo $i ?></td>
                      <td><?php echo $data['MST_IKI_INDIKATOR'] ?></td>
                      <td><?php echo $data['MST_IKI_DEFINISI'] ?></td>
                      <td class="text-center"><?php echo $data['MST_IKI_TARGET'] ?></td>
                      <td class="text-center"><?php echo $data['SCORE'] ?></td>
                      <td class="text-center"><?php echo $data['MST_IKI_BOBOT'] ?></td>
                      <td class="text-center"><?php $jumlahkuantitas = $data['total_kuantitas'];
                      echo number_format($jumlahkuantitas,2); ?></td>
                    </tr>
                    <tr>
                      <td class="text-bold" colspan="2">JUMLAH KUANTITAS</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center text-bold"><?php echo number_format($jumlahkuantitas,2) ?></td>
                    </tr>
                  <?php }else{?>
                    <tr>
                      <td colspan="7">Data tidak tersedia</td>
                    </tr>
                  <?php } ?>
                  
                  <tr>
                    <td class="text-bold" bgcolor="lightgrey">B.</td>
                    <td class="text-bold" colspan="6" bgcolor="lightgrey">KUALITAS</td>
                  </tr>
                  <?php 
                  $i=1;
                  if ($this->data['kualitas']!=null) {

                    foreach ($this->data['kualitas'] as $key => $value):?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value['MST_IKI_INDIKATOR'] ?></td>
                        <td><?php echo $value['MST_IKI_DEFINISI'] ?></td>
                        <td class="text-center"><?php echo $value['MST_IKI_TARGET'] ?></td>
                        <td class="text-center"><?php echo $value['SCORE'] ?></td>
                        <td class="text-center"><?php echo $value['MST_IKI_BOBOT'] ?></td>
                        <td class="text-center"><?php echo number_format($value['NILAI'],2) ?></td>
                      </tr>
                      <?php 
                      $i++;
                    endforeach ?>
                    <tr>
                      <?php 
                      for ($i=0; $i < count($this->data['kualitas']) ; $i++) { 
                        $jumlahkualitas[] = $this->data['kualitas'][$i]['NILAI'];
                      }
                      ?>
                      <td></td>
                      <td class="text-bold">JUMLAH KUALITAS</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center text-bold">
                        <?php echo number_format(array_sum($jumlahkualitas),2) ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-bold" colspan="2">JUMLAH KUANTITAS DAN KUALITAS</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center text-bold"><?php echo number_format($jumlahkuantitas+array_sum($jumlahkualitas),2) ?></td>
                    </tr>
                  <?php }else{?>
                    <tr>
                      <td colspan="7">Data tidak tersedia</td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td class="text-bold" bgcolor="lightgrey">C.</td>
                    <td class="text-bold" colspan="6" bgcolor="lightgrey">PERILAKU</td>
                  </tr>
                  <?php 
                  $i=1;
                  if ($this->data['perilaku']!=null) {
                    foreach ($this->data['perilaku'] as $key => $value): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td><?php echo $value['MST_IKI_INDIKATOR'] ?></td>
                        <td><?php echo $value['MST_IKI_DEFINISI'] ?></td>
                        <td class="text-center"><?php echo $value['MST_IKI_TARGET'] ?></td>
                        <td class="text-center"><?php echo $value['SCORE'] ?></td>
                        <td class="text-center"><?php echo $value['MST_IKI_BOBOT'] ?></td>
                        <td class="text-center"><?php echo number_format($value['NILAI'],2) ?></td>
                      </tr>
                      <?php 
                      $i++;
                    endforeach ?>
                    <tr>
                      <?php 
                      for ($i=0; $i < count($this->data['perilaku']) ; $i++) { 
                        $jumlahperilaku[] = $this->data['perilaku'][$i]['NILAI'];
                      }
                      ?>
                      <td></td>
                      <td class="text-bold">JUMLAH PERILAKU</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center text-bold">
                        <?php echo number_format(array_sum($jumlahperilaku),2) ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-bold" colspan="2">JUMLAH NILAI KINERJA INDIVIDU</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="text-center text-bold">
                        <?php $totalNilai = array_sum($jumlahperilaku)+array_sum($jumlahkualitas)+$jumlahkuantitas;
                        echo number_format($totalNilai,2);
                        ?>
                      </td>
                    </tr>
                  <?php }else{?>
                    <tr>
                      <td colspan="7">Data tidak tersedia</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
</div>

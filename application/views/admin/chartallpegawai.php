
<section class="content-wrapper">
  <div class="content">
        <div class="box box-default print">
          <div class="box-header">
            <div class="row">
              <div class="col-md-8">
                <form method="post" class="form-inline form-xs" action="<?php echo site_url('Chartpegawai/sortByMonthAll') ?>" enctype="multipart/form-data">
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
                    <a onclick="window.location='<?php echo base_url('Chartpegawai/') ?>'" type="button" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i>   Refresh</a>
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
            <h3 class="box-title">Grafik Nilai Karyawan</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body chart-responsive">
            <div class="bar-chart" id="allchart" style="height: 300px"></div>
          </div>
        </div>
  </div>
</section>

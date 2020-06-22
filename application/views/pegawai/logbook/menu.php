<div class="container print">
	<div class="box box-default">
		<div class="box-header">
			<div class="row">
				<div class="col-md-8">
					<form method="post" class="form-inline form-xs" action="<?php echo site_url('pegawai/logbook/getlogbookdatesorting') ?>" enctype="multipart/form-data">
						<span class="label label-default" style="background-color: #d8f5b5"><b>Tanggal </b></span>
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' name="datestart" id="datestart" class="form-control input-sm" data-date-format="YYYY-MM-DD" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d") ?>" />
							<span class="input-group-addon">
								<span class="fa fa-calendar"></span>
							</span>
						</div>

						<span class="label label-default" style="background-color: #d8f5b5"><b>s/d </b></span>
						<div class='input-group date' id='datetimepicker2'>
							<input type='text' name="dateend" id="dateend" class="form-control input-sm" data-date-format="YYYY-MM-DD" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d") ?>" />
							<span class="input-group-addon">
								<span class="fa fa-calendar"></span>
							</span>
						</div>
						<div class="btn-group btn-group-xs" role="group">
							<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
						</div>
					</form>
				</div>
				<div class="col-md-4">
				 	<div class="btn-group btn-group-justified" role="group" aria-label="...">
				 		<div class="btn-group btn-group-xs" role="group">
				 			<a onclick="print()" type="button" class="btn btn-success"><i class="glyphicon glyphicon-print"></i>   Cetak</a>
				 		</div>
						<div class="btn-group btn-group-xs" role="group">
							<a href="<?php echo site_url('pegawai/logbook') ?>" type="button" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i>   Refresh</a>
						</div>
						<div class="btn-group btn-group-xs" role="group">
							<a href="#formadd" data-toggle="modal" onclick="submit('tambah')" type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>   Add Logbook</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
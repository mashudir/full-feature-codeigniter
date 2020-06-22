<div class="content-wrapper">
	<section class="content">
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
							<li><a>NIP <span class="pull-right badge bg-blue" id="pg-nip"><?php echo $this->session->userdata('iden_nip') ?></span></a></li>
							<li><a>Jabatan <span class="pull-right badge bg-aqua" id="pg-jab"><?php echo $this->session->userdata('iden_jabatan') ?></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="box print">
					<div class="box-body">
						<div class="col-md-10 text-sm pull-left">
							<form method="post" class="form-inline form-sm" action="<?php echo site_url('admin/logbooksortdate') ?>" enctype="multipart/form-data">
								<input type="hidden" name="kode" value="<?php echo $this->session->userdata('iden_kode') ?>">
								<span class="label label-default" style="background-color: #d8f5b5"><b>Tanggal </b></span>
								<div class='input-group date' id='sort1'>
									<input type='text' name="datestart" id="datestart" class="form-control-xs" data-date-format="YYYY-MM-DD" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d") ?>"/>
									<span class="input-group-addon input-sm">
										<span class="fa fa-calendar"></span>
									</span>
								</div>

								<span class="label label-default" style="background-color: #d8f5b5"><b>s/d </b></span>
								<div class='input-group date' id='sort2'>
									<input type='text' name="dateend" id="dateend" class="form-control-xs" data-date-format="YYYY-MM-DD" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d") ?>"/>
									<span class="input-group-addon input-sm">
										<span class="fa fa-calendar"></span>
									</span>
								</div>
								<div class="btn-group btn-group-xs" role="group">
									<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
								</div>
							</form>
						</div>
						<!-- <div class="col-md-1"></div> -->
						<div class="col-md-1 text-sm">
							<a onclick="window.location='<?php echo base_url('admin/logbookpegawai/').$this->session->userdata('iden_kode') ?>'" type="submit" class="btn btn-xs btn-info pull-right"><i class="fa fa-refresh"></i>Refresh</a>
						</div>
						<div class="col-md-1 text-sm">
							<a onclick="print()" type="button" class="btn btn-xs btn-success pull-right"><i class="glyphicon glyphicon-print"></i>   Cetak</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<div class="dataTables_filter">
									<table id="example4" class="table table-bordered table-stripped display responsive wrap" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Tanggal Mulai</th>
												<th>Tanggal Akhir</th>
												<th>Kegiatan</th>
												<th>Keterangan Kegiatan</th>
												<th>Output</th>
												<th>Level Kesulitan</th>
												<th>Sumber Data</th>
												<th class="print">Aksi</th>
											</tr>
										</thead>
										<tbody id="target">
											<?php foreach ($this->data['logbook'] as $lb): ?>
												<tr <?php 
												if ($lb['TLB_IS_VERIF'] == 0) {?>
												<?php }else{?>
													style= "color:blue"
													<?php } ?>>
													<td><?php echo $lb['TLB_TANGGAL'] ?></td>
													<td><?php echo $lb['TLB_TANGGAL_AKHIR'] ?></td>
													<td><?php echo $lb['TLB_NAMA_KEGIATAN'] ?></td>
													<td><?php echo $lb['TLB_KETERANGAN_KEGIATAN'] ?></td>
													<td><?php echo $lb['TLB_OUTPUT'] ?></td>
													<td><?php echo $lb['RLK_NAMA'] ?></td>
													<td>
														<?php
														if ($lb['TLB_SOURCE_DATA'] == '1'){
															echo "Mobile";
														}elseif($lb['TLB_SOURCE_DATA'] == '2'){
															echo "Simetris Online";
														}elseif($lb['TLB_SOURCE_DATA'] == '3'){
															echo "SIMRS";
														}else{
															echo "Sumber data tidak valid";
														}
														?>
													</td>
													<td class="print">
														<?php 
														if ($lb['TLB_IS_VERIF'] == 0) {?>
															<form actionrole="form" onSubmit="return false">
																<input type="hidden" name="id" id="id" value="<?php echo $lb['TLB_ID'] ?>">
																<input type="checkbox" name="veriv" id="veriv" value="1">
																<button class="btn btn-xs subver" type="submit" onclick="check()">check</button>
															</form>
														<?php }else{?>
															<i class="glyphicon glyphicon-check text-info">Verivied</i>
														<?php } ?>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
	function check(){
		var id = $('#id').val();
		var veriv = $('#veriv:checked').val();

		$.ajax({
			type:'POST',
			data: "id="+id+"&veriv="+veriv,
			url:'<?php echo base_url('admin/check') ?>',
			dataType : 'JSON',
			success : function(hasil){
				$('.subver').text('checked');
				$('.subver').attr('disabled', true);
				window.location.reload(true);
			}
		});
	}
</script>
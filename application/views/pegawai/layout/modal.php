		<!-- MODAL FORM ADD -->
		<div class="modal fade" id="formadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center" style="background-color: lightblue">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title w-100 font-weight-bold"><b>LOGBOOK</b></h4>
					
				</div>
				<p id="pesan" class="text-center text-danger"></p>
				<form actionrole="form" onSubmit="return false" enctype="multipart/form-data" id="formLogbook">
					<input type="hidden" name="kode_pegawai" id="kode_pegawai" value="<?php echo $this->session->userdata('KODE')?>">
					<input type="hidden" name="nama_pegawai" id="nama_pegawai" value="<?php echo $this->session->userdata('NAMA')?>">
					<input type="hidden" name="kode_unit" id="kode_unit" value="<?php echo $this->session->userdata('MSU_KODE')?>">
					<input type="hidden" name="tlb_id" id="tlb_id" value="">
					<div class="modal-body mx-3">
						<div class="row">
							<div class="col-md-6">
								<div class="md-form mb-5">
									<label>
										<strong>Tanggal Mulai</strong>
									</label>
									<div class='input-group date' id='datetimepicker3'>
										<input type='text' name="tanggal_awal" id="tanggal_awal" class="form-control" data-date-format="YY/MM/DD HH:mm:ss" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d H:i:s") ?>" />
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
								</div>

								<div class="md-form mb-5">
									<label>
										<strong>Tanggal Akhir</strong>
									</label>
									<div class='input-group date' id='datetimepicker4'>
										<input type='text' name="tanggal_ahir" id="tanggal_ahir" class="form-control" data-date-format="YY/MM/DD HH:mm:ss" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("y/m/d H:i:s") ?>" />
										<span class="input-group-addon">
											<span class="fa fa-calendar"></span>
										</span>
									</div>
								</div>

								<div class="md-form mb-5">
									<label for="select-beast-selectized"><strong>Nama Kegiatan</strong></label>
									<div class="form-group">
										<select id="baggage" class="form-control kegiatan" placeholder="Pilih Kegiatan ..." tabindex="-1" name="nama_kegiatan">
											<option value="" selected=""></option>
											<?php foreach ($this->data['kegiatanlogbook'] as $kegiatan): ?>
												<option value="<?php echo $kegiatan['MKL_KODE']; ?>"><?php echo $kegiatan['MKL_NAMA']; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<div class="md-form">
									<i class="fa fa-pencil"></i>
									<label data-error="wrong" data-success="right" for="form8">Keterangan Kegiatan</label>
									<textarea type="text" placeholder="Keterangan" name="keterangan_logbook" id="keterangan_logbook" class="md-textarea form-control" rows="4"></textarea>
								</div>
							</div>
							<div class="col-md-6">

								<div class="md-form mb-5">
									<label for="select-beast-selectized"><strong>Output</strong></label>
									<div class="form-group">
										<select id="baggage3" class="form-control output" placeholder="Output ..." tabindex="-1" name="output_logbook">
											<option value="" selected="selected"></option>
											<option value="selesai">Selesai</option>
											<option value="tidak selesai">Tidak Selesai</option>
											<option value="ditunda">Ditunda</option>
										</select>
									</div>
								</div>

								<!-- <div class="md-form">
									<i class="fa fa-pencil"></i>
									<label data-error="wrong" data-success="right" for="form8">Output</label>
									<textarea type="text" placeholder="Output" name="output_logbook" id="output_logbook" class="md-textarea form-control" rows="4"></textarea>
								</div> -->

								<div class="md-form mb-5">
									<label for="select-beast-selectized"><strong>Level Kesulitan</strong></label>
									<div class="form-group">
										<select id="baggage2" class="form-control kesulitan" placeholder="Level Kesulitan ..." tabindex="-1" name="level_kesulitan">
											<option value="" selected="selected"></option>
											<?php foreach ($this->data['levelkesulitan'] as $kesulitan): ?>
												<option value="<?php echo $kesulitan['RLK_KODE']; ?>"><?php echo $kesulitan['RLK_NAMA']; ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button class="btn btn-light" data-dismiss="modal">BATAL <i class="fa fa-times ml-1"></i></button>
						<button class="btn btn-info" id="btn-ubah" onclick="ubahlogbook()">UBAH <i class="fa fa-paper-plane-o ml-1"></i></button>
						<button class="btn btn-info" id="btn-tambah" onclick="tambahlogbook()">SIMPAN <i class="fa fa-paper-plane-o ml-1"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END OF MODAL FORM ADD -->

	<!-- MODAL HAPUS -->
	<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin menghapus data ini ?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
				<div class="modal-footer">
					<button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
					<a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
				</div>
			</div>
		</div>
	</div>
		<!-- END OF MODAL HAPUS -->
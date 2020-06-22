		<!-- MODAL FORM ADD PEGAWAI -->
<div class="modal fade" id="formadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center" style="background-color: lightblue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="modal-title" class="modal-title w-100 font-weight-bold"><b>PEGAWAI</b></h4>
				
			</div>
				<p id="error_msg" class="text-center text-danger"></p>
			<form actionrole="form" onSubmit="return false" enctype="multipart/form-data" id="form">
				<input type="hidden" name="idpegawai" id="idpegawai" value="">
				<div class="modal-body mx-3">
					<div class="row">
						<div class="col-md-6">
					<div class="md-form mb-5">
						<label>
							<strong>Nama Pegawai</strong>
						</label>
						<div class='input-group'>
							<input type='text' name="namapegawai" id="namapegawai" class="form-control" placeholder="Nama pegawai" required="" />
							<span class="input-group-addon">
								<span class="fa fa-user"></span>
							</span>
						</div>
						<p id="nama_alert" style="color: red"></p>
					</div>

					<div class="md-form">
						<label data-error="wrong" data-success="right" for="form8">Alamat</label>
						<textarea type="text" placeholder="Alamat pegawai" name="alamatpegawai" id="alamatpegawai" class="md-textarea form-control" rows="4" required=""></textarea>
						<p id="alamat_alert" style="color: red"></p>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Jenis Kelamin</strong></label>
						<div class="form-group">
							<label class="radio-inline"><input type="radio" value="L" name="jeniskelamin" required="">Laki-laki</label>
							<label class="radio-inline"><input type="radio" value="P" name="jeniskelamin" required="">Perempuan</label>
						</div>
					</div>

					<div class="md-form mb-5">
						<label>
							<strong>Nomer telepon</strong>
						</label>
						<div class='input-group'>
							<input type="text" name="nomertelepon" id="nomertelepon" class="form-control" placeholder="Nomer telepon" required="">
						<span class="input-group-addon">
							<span class="fa fa-phone"></span>
						</span>
						</div>
						<p id="nomortelepon_alert" style="color: red"></p>
					</div>

					<div class="md-form mb-5">
						<label>
							<strong>Email</strong>
						</label>
						<div class='input-group'>
							<input type="email" name="email" id="email" class="form-control" placeholder="example@domain.com" required="">
						<span class="input-group-addon">
							<span class="fa fa-envelope"></span>
						</span>
						</div>
						<p id="email_alert" style="color: red"></p>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Agama</strong></label>
						<div class="form-group">
							<select id="baggage2" class="form-control agama" placeholder="Agama ..." tabindex="-1" name="agama">
								<option value="" selected="selected"></option>
								<?php foreach ($this->data['agama'] as $agama): ?>
									<option value="<?php echo $agama['RAG_KODE']; ?>"><?php echo $agama['REF_AGAMA_NAMA']; ?></option>
								<?php endforeach ?>
							</select>
							<p id="agama_alert" style="color: red"></p>
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="md-form">
						<label data-error="wrong" data-success="right" for="form8">Tempat Lahir</label>
						<input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Kota kelahiran" required="">
						<p id="tempatlahir_alert" style="color: red"></p>
					</div>

					<div class="md-form mb-5">
						<label>
							<strong>Tanggal Lahir</strong>
						</label>
						<div class='input-group date' id='datetimepicker1'>
							<input type='text' name="tanggallahir" id="tanggallahir" class="form-control" data-date-format="YYYY-MM-DD HH:mm:ss" value="" />
							<span class="input-group-addon">
								<span class="fa fa-calendar"></span>
							</span>
						</div>
						<p id="tanggallahir_alert" style="color: red"></p>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Unit</strong></label>
						<div class="form-group">
							<select id="unit" class="form-control unit" placeholder="Unit ..." tabindex="-1" name="unit">
								<option value="" selected="selected"></option>
								<?php foreach ($this->data['unit'] as $unit): ?>
									<option value="<?php echo $unit['MSU_KODE']; ?>"><?php echo $unit['MSU_NAMA']; ?></option>
								<?php endforeach ?>
							</select>
							<p id="unit_alert" style="color: red"></p>
						</div>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Jabatan</strong></label>
						<div class="form-group">
							<select id="jabatan" class="form-control jabatan" placeholder="Jabatan ..." tabindex="-1" name="jabatan">
								<option value="" selected="selected"></option>
								<?php foreach ($this->data['jabatan'] as $jabatan): ?>
									<option value="<?php echo $jabatan['REF_JB_FN_KODE']; ?>"><?php echo $jabatan['REF_JB_FN_NAMA']; ?></option>
								<?php endforeach ?>
							</select>
							<p id="jabatan_alert" style="color: red"></p>
						</div>
					</div>

					<div class="form-group" id="photo-preview">
						<label class="control-label col-md-3">Preview</label>
						<div class="col-md-9">
							(No photo)
							<span class="help-block"></span>
						</div>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Foto</strong></label>
						<p>* maximal ukuran file 100 kb, format (jpg/jpeg/png)</p>
						<div class="form-group">
							<input type="file" name="foto" class="form-control" id="foto">
						</div>
						<p id="foto_alert" style="color: red"></p>
					</div>
					</div>
				</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-light" data-dismiss="modal">BATAL <i class="fa fa-times ml-1"></i></button>
					<button class="btn btn-info" id="btn-ubah" onclick="ubahpegawai()">UBAH <i class="fa fa-paper-plane-o ml-1"></i></button>
					<button class="btn btn-info" id="btn-tambah" onclick="tambahpegawai()">SIMPAN <i class="fa fa-paper-plane-o ml-1"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
		<!-- END OF MODAL FORM ADD PEGAWAI -->

		<!-- MODAL ADD MASTER KEGIATAN LOGBOOK -->
<div class="modal fade" id="formaddlb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center" style="background-color: lightblue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="modal-titlelb" class="modal-title w-100 font-weight-bold"><b>MASTER KEGIATAN LOGBOOK</b></h4>
			</div>
				<p id="pesan_lb" class="text-center text-danger"></p>
			<form actionrole="form" onSubmit="return false" enctype="multipart/form-data" id="formlb">
				<input type="hidden" name="idlogbook" id="idlogbook" value="">
				<div class="modal-body mx-3">
					<div class="row">
						<div class="col-md-6">
					<div class="md-form mb-5">
						<label>
							<strong>Nama kegiatan</strong>
						</label>
						<div class='input-group'>
							<input type='text' name="namakegiatan" id="namakegiatan" class="form-control" placeholder="Nama kegiatan" required="" />
							<span class="input-group-addon">
								<span class="fa fa-gear"></span>
							</span>
						</div>
						<p id="namakegiatan_alert" style="color: red"></p>
					</div>

					<div class="md-form">
						<label data-error="wrong" data-success="right" for="form8">Keterangan kegiatan</label>
						<textarea type="text" placeholder="Keterangan kegiatan" name="keterangankegiatan" id="keterangankegiatan" class="md-textarea form-control" rows="4" required=""></textarea>
						<p id="keterangankegiatan_alert" style="color: red"></p>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Score</strong></label>
						<div class="form-group">
							<select class="form-control" name="score" id="score">
								<option value="" disabled="" selected="">Pilih antara 1-4</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
							<p id="score_alert" style="color: red"></p>
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Unit</strong></label>
						<div class="form-group">
							<select id="mstunit" class="form-control mstunit" placeholder="Unit ..." tabindex="-1" name="mstunit" required="">
								<option value="" selected="selected"></option>
								<?php foreach ($this->data['unit'] as $unit): ?>
									<option value="<?php echo $unit['MSU_KODE']; ?>"><?php echo $unit['MSU_NAMA']; ?></option>
								<?php endforeach ?>
							</select>
							<p id="unit_alert" style="color: red"></p>
						</div>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Jabatan fungsional</strong></label>
						<div class="form-group">
							<select id="mstjabatan" class="form-control mstjabatan" placeholder="Jabatan ..." tabindex="-1" name="mstjabatan">
								<option value="" selected="selected"></option>
								<?php foreach ($this->data['jabatan'] as $jabatan): ?>
									<option value="<?php echo $jabatan['REF_JB_FN_KODE']; ?>"><?php echo $jabatan['REF_JB_FN_NAMA']; ?></option>
								<?php endforeach ?>
							</select>
							<p id="jabatan_alert" style="color: red"></p>
						</div>
					</div>
					</div>
				</div>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-light" data-dismiss="modal">BATAL <i class="fa fa-times ml-1"></i></button>
					<button class="btn btn-info" id="btn-ubahlb" onclick="ubahlb()">UBAH <i class="fa fa-paper-plane-o ml-1"></i></button>
					<button class="btn btn-info" id="btn-tambahlb" onclick="tambahlb()">SIMPAN <i class="fa fa-paper-plane-o ml-1"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
		<!-- END OF MODAL ADD MASTER KEGIATAN LOGBOOK -->

<!-- MODAL ADD IKI -->
<div class="modal fade" id="formaddiki" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center" style="background-color: lightblue">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 id="modal-titleiki" class="modal-title w-100 font-weight-bold"><b>MASTER INDEKS KINERJA</b></h4>
			</div>
				<p id="pesan_iki" class="text-center text-danger"></p>
			<form actionrole="form" onSubmit="return false" enctype="multipart/form-data" id="formiki">
				<input type="hidden" name="idiki" id="idiki" value="">
				<input type="hidden" name="bobot_lama" id="bobot_lama">
				<div class="modal-body mx-3">
					<div class="row">
						<div class="col-md-6">
					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Kategori</strong></label>
						<div class="form-group">
							<select id="kategori" class="form-control kategori" required="" placeholder="Kategori ..." tabindex="-1" name="kategori" required="">
								<option value="" selected="selected"></option>
								<option value="kualitas">Kualitas</option>
								<option value="kuantitas">Kuantitas</option>
								<option value="perilaku">Perilaku</option>
							</select>
							<p id="kategori_alert" style="color: red"></p>
						</div>
					</div>

					<div class="md-form">
						<label data-error="wrong" data-success="right" for="form8">Indikator</label>
						<textarea type="text" placeholder="Indikator" name="indikator" id="indikator" class="md-textarea form-control" rows="4" required=""></textarea>
						<p id="indikator_alert" style="color: red"></p>
					</div>

					<div class="md-form">
						<label data-error="wrong" data-success="right" for="form8">Definisi</label>
						<textarea type="text" placeholder="Definisi" name="definisi" id="definisi" class="md-textarea form-control" rows="4" required=""></textarea>
						<p id="definisi_alert" style="color: red"></p>
					</div>
					</div>

					<div class="col-md-6">
					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Target</strong></label>
						<div class="form-group">
							<select id="target" class="form-control target" required="" placeholder="Target 1-100" max="100" tabindex="-1" name="target">
								<option value="" selected="selected"></option>
								<?php for ($i=1; $i <= 100 ; $i++) { ?>
									<option value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php } ?>
							</select>
							<p id="target_alert" style="color: red"></p>
						</div>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Bobot</strong></label>
						<div class="input-group">
							<select id="bobot" class="form-control bobot" required="" placeholder="Bobot 1%-50%" max="50"  tabindex="-1" name="bobot">
								<option value="" selected="selected"></option>
								<?php for ($i=1; $i <= 50 ; $i++) { ?>
									<option value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php } ?>
							</select>
							<span class="input-group-addon">
								<span class="fa fa-percent"></span>
							</span>
						</div>
						<p id="bobot_alert" style="color: red"></p>
					</div>
					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Unit</strong></label>
						<div class="form-group">
							<select id="mstunit2" class="form-control mstunit2" placeholder="Unit ..." tabindex="-1" name="mstunit2">
								<option value="" selected="selected"></option>
								<?php foreach ($this->data['units'] as $unit): ?>
									<option value="<?php echo $unit['MSU_KODE']; ?>"><?php echo $unit['MSU_NAMA']; ?></option>
								<?php endforeach ?>
							</select>
							<p id="mstunit2_alert" style="color: red"></p>
						</div>
					</div>

					<div class="md-form mb-5">
						<label for="select-beast-selectized"><strong>Jabatan fungsional</strong></label>
						<div class="form-group">
							<select id="mstjabatan2" class="form-control mstjabatan2" placeholder="Jabatan ..." tabindex="-1" name="mstjabatan2">
								<option value="" selected="selected"></option>
								<?php foreach ($this->data['jabatans'] as $jabatan): ?>
									<option value="<?php echo $jabatan['REF_JB_FN_KODE']; ?>"><?php echo $jabatan['REF_JB_FN_NAMA']; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					</div>
				</div>
				</div>
				<p style="color: red" id="error"></p>
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-light" data-dismiss="modal">BATAL <i class="fa fa-times ml-1"></i></button>
					<button class="btn btn-info" id="btn-ubahiki" onclick="ubahiki()">UBAH <i class="fa fa-paper-plane-o ml-1"></i></button>
					<button class="btn btn-info" id="btn-tambahiki" onclick="tambahiki()">SIMPAN <i class="fa fa-paper-plane-o ml-1"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END OF MODAL ADD IKI -->
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
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>
		<!-- END OF MODAL HAPUS -->
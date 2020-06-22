<div class="content-wrapper">
	<div class="container">
		<div class="box box-default">
			<div class="box-header">
				<div class="row">
					<div class="col-md-3">
						<div class="text-center">
							<img src="<?php echo base_url('assets/img/'.$this->session->userdata('FOTO')) ?>" width="150" class="img-rounded">
						</div>
					</div>
					<div class="col-md-9">
						<div class="input-group input-group-md">
							<span class="input-group-addon" style="min-width: 100px"><p class="pull-left">NAMA</p></span>
							<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata('NAMA') ?>" readonly>
						</div>
						<div class="input-group input-group-md">
							<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">NIP</p></span>
							<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata('NIP') ?>" readonly>
						</div>
						<div class="input-group input-group-md">
							<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">JABATAN</p></span>
							<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata('JABATAN') ?>" readonly>
						</div>
					</div>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<div class="card-header text-center" id="headingOne" style="font-size: 20px">
									DATA PRIBADI
								</div>
							</a>
							<hr>
							<div class="card card-body">
								<div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionGroup">
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">NAMA</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['NAMA'] ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">NIP</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['NIP'] ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">JENIS KELAMIN</p></span>
										<?php
											if($this->session->userdata['JK'] == 'P'){
												$JK = "Perempuan";
											}elseif($this->session->userdata['JK'] == 'L'){
												$JK = "Laki-laki";
											}
										?>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $JK ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">ALAMAT</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['ALAMAT'] ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">AGAMA</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['AGAMA'] ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">TPT LAHIR</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['TPTLAHIR'] ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">TGL LAHIR</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['TGLLAHIR'] ?>" readonly>
									</div>
									<hr>
								</div>	
							</div>	
						</div>
						<!-- 2 -->
						<div class="card">
							<a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
								<div class="card-header text-center" id="headingOne" style="font-size: 20px">
									KONTAK
								</div>
							</a>
							<hr>
							<div class="card card-body">
								<div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionGroup">
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">TELEPON</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['TELP'] ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">E-mail</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['EMAIL'] ?>" readonly>
									</div>
									<hr>
								</div>	
							</div>	
						</div>
						<!-- 3 -->
						<div class="card">
							<a class="card-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								<div class="card-header text-center" id="headingThree" style="font-size: 20px">
									ADMINISTRASI
								</div>
							</a>
							<hr>
							<div class="card card-body">
								<div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionGroup">
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">INSTALASI</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['MSU_NAMA'] ?>" readonly>
									</div>
									<div class="input-group input-group-md mb-3">
										<span class="input-group-addon" id="basic-addon1" style="min-width: 100px"><p class="pull-left">JABATAN</p></span>
										<input type="text" class="form-control" aria-describedby="basic-addon1" value="<?php echo $this->session->userdata['JABATAN'] ?>" readonly>
									</div>
									<hr>
								</div>	
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('pegawai/logbook/menu') ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
					<div class="dataTables_filter">
						<table id="example" class="display" style="width:100%">
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
								<?php foreach ($this->data['logbooktoday'] as $lb): ?>
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
												<a class="btn btn-xs text-success" href="#formadd" onclick="submit(<?php echo $lb['TLB_ID'] ?>)" data-toggle="modal">
													<i class="glyphicon glyphicon-edit"></i>Edit</a>
													<a onClick="konfirmasiHapus('<?php echo site_url('pegawai/logbook/deletelogbook/'.$lb['TLB_ID']) ?>')"
														href="#!" class="btn btn-xs text-danger">
														<i class="glyphicon glyphicon-trash"></i>Hapus</a>
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

 
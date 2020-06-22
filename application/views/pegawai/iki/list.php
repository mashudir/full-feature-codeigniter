<?php $this->load->view('pegawai/iki/menu') ?>
<div class="content-wrapper">
	<div class="container">
		<div class="box box-default">
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
							<td class="text-center"><?php $jumlahkuantitas = ($data['MST_IKI_BOBOT']/$data['MST_IKI_TARGET'])*$data['SCORE'];
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
	<title>Laporan Absensi</title>
	<style type="text/css">
	.container-fluid{
		font-family: sans-serif;
	}
	table {
		border-spacing: 0;
		border-collapse: collapse;
		background-color: transparent;
		margin: 10px 0;
		text-align: center;
	}
	.table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
	}
	.table-bordered th,
	.table-bordered td {
		border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > tbody > tr > th,
	.table-bordered > thead > tr > td,
	.table-bordered > tbody > tr > td,{
		border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > thead > tr > td {
		border-bottom-width: 2px;
	}
	h4{
		font-size: 18px;
	}
	img{
		width: 100%;
	}
	</style>
	<div class="container-fluid">
		<h2 style="text-align: center;margin:0;padding:0;font-size:22px;line-height:1.5;">
			<b>Laporan Absensi</b>
		</h2>
		<h5 style="text-align: center;margin:0;padding:0;font-size:14px;line-height:1.5;">
			Periode <?php echo date('d/m/Y',strtotime($dari)); ?> sampai <?php echo date('d/m/Y',strtotime($sampai)); ?>
		</h5>
		<br>
		<?php
			$arrayBulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			$arrayHari = array(
				'Mon'=>'Sen',
				'Tue'=>'Sel',
				'Wed'=>'Rab',
				'Thu'=>'Kam',
				'Fri'=>'Jum',
				'Sat'=>'Sab',
				'Sun'=>'Mgg'
			);
			if ($cetak != null) { 
		?>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th rowspan="2" style="text-align:center;vertical-align: middle;">
						<?php
							$dari_bulan = @date('m',$dari);
							$sampai_bulan = @date('m',$sampai);
							if ($dari_bulan==$sampai_bulan) {
								echo $arrayBulan[$dari_bulan-1];
							} else {
								echo $arrayBulan[$dari_bulan-1].' - '.$arrayBulan[$sampai_bulan-1];
							}
						?>
						</th>
						<?php
							$tgl1 = new DateTime($dari);
							$tgl2 = new DateTime($sampai);
							$jarak = $tgl2->diff($tgl1);
						?>
						<th colspan="<?=($jarak->d*2)+3;?>" style="text-align:center;">Tanggal <?=@date('d/m/Y',strtotime($dari));?> sampai <?=@date('d/m/Y',strtotime($sampai));?></th>
					</tr>
					<tr>
					<?php
						for ($i=$tgl1; $i <= $tgl2; $i->modify('+1 day')) {
							echo "<th style='text-align:center;' colspan='2'>".$arrayHari[$i->format("D")] ."</th>";
						}
					?>
						<th rowspan="3" style="vertical-align: middle;text-align: center;">Total</th>
					</tr>
					<tr>
						<th rowspan="2">Nama Karyawan</th>
					<?php
						$tgl1 = new DateTime($dari);
						$tgl2 = new DateTime($sampai);
						for ($i=$tgl1; $i <= $tgl2; $i->modify('+1 day')) {
							echo "<th style='text-align:center;' colspan='2'>".$i->format("d")."</th>";
						}
					?>
					</tr>
					<tr>
					<?php
						$tgl1 = new DateTime($dari);
						$tgl2 = new DateTime($sampai);
						for ($i=$tgl1; $i <= $tgl2; $i->modify('+1 day')) {
							echo "<th style='text-align:center;'> Pagi </th>
							<th style='text-align:center;'> Siang </th>";
						}
					?>
					</tr>
				</thead>
				<tbody>
				<?php
					// absenPegawai, totalAbsenTgl, totalAbsenPgw, totalAbsenPgwAll
					// Sebagai isian baris total absen harian [BARIS TERBAWAH]
					$totalAbsenTgl=array();
					// Sebagai isian kolom total absen pegawai [KOLOM TERKANAN]
					$totalAbsenPgw=array();
					foreach ($pegawai as $k => $pgw) {
				?>
				<tr>
					<td><?php echo $pgw->nama; ?></td>
					<?php
						// DAFTARKAN DATA ABSEN KE ARRAY PEGAWAI
						// DATA ABSEN AKAN DICOCOKKAN SESUAI KOLOM TABEL
						//'jml_absen'=>$va->jml_absen,
						$absenPegawai = array();
						foreach ($cetak as $ka => $va) {
							if ($va->id_pegawai==$pgw->id) {
								$absenPegawai[$va->tanggal][$va->kategori] = array('keterangan'=>$va->keterangan);
							}
						}
						$tgl1 = new DateTime($dari);
						$tgl2 = new DateTime($sampai);
						if (empty(@$totalAbsenPgw[$pgw->id])) {
							$totalAbsenPgw[$pgw->id] = 0;
						}
						for ($i=$tgl1; $i <= $tgl2; $i->modify('+1 day')) {
							if (empty(@$totalAbsenTgl[$i->format("Y-m-d")])) {
								$totalAbsenTgl[$i->format("Y-m-d")] = 0;
							}

							$jml_absen=0;
							if (!empty(@$absenPegawai[$i->format("Y-m-d")])) {
								$jml_absen=count(@$absenPegawai[$i->format("Y-m-d")]);
							}
							$arrAbsenPagi = @$absenPegawai[$i->format("Y-m-d")]['pagi'];
							$arrAbsenSiang = @$absenPegawai[$i->format("Y-m-d")]['siang'];
							$keterangan = @$absenPegawai[$i->format("Y-m-d")]['pagi']['keterangan'];
							$keterangan1 = @$absenPegawai[$i->format("Y-m-d")]['siang']['keterangan'];
							// $jml_absen = @$absenPegawai[$i->format("Y-m-d")][$i]['jml_absen'];
							$bgcolor='';
							if (empty($arrAbsenPagi)) {
								$bgcolor='background:red;';
							}
							if (!empty($arrAbsenPagi) && !empty($keterangan)) {
								if ($keterangan=='S') {
									$bgcolor='background:lightgreen;';
								} else if ($keterangan=='I') {
									$bgcolor='background:orange';
								} else {
									$bgcolor='background:red;';
								}
							}
							echo "<td style='text-align:center;".$bgcolor."'>";
							if (!empty($arrAbsenPagi)) {
								if (!empty($keterangan)) {
									echo $keterangan;
								} else {
									echo "-";
									$totalAbsenTgl[$i->format("Y-m-d")]+=0.5;
									$totalAbsenPgw[$pgw->id]+=0.5;
								}
							}
							echo "</td>";
							$bgcolor1='';
							if (empty($arrAbsenSiang)) {
								$bgcolor1='background:red;';
							}
							if (!empty($arrAbsenSiang) && !empty($keterangan1)) {
								if ($keterangan1=='S') {
									$bgcolor1='background:lightgreen;';
								} else if ($keterangan1=='I') {
									$bgcolor1='background:orange';
								} else {
									$bgcolor1='background:red;';
								}
							}
							echo "<td style='text-align:center;".$bgcolor1."'>";
							if (!empty($arrAbsenSiang)) {
								if (!empty($keterangan1)) {
									echo $keterangan1;
								} else {
									echo "-";
									$totalAbsenTgl[$i->format("Y-m-d")]+=0.5;
									$totalAbsenPgw[$pgw->id]+=0.5;
								}
							}
							echo "</td>";
						}
					?>

					<td style='text-align:center;'>
						<?php echo @$totalAbsenPgw[$pgw->id];?>
					</td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td>Total</td>
					<?php
						$tgl1 = new DateTime($dari);
						$tgl2 = new DateTime($sampai);
						for ($i=$tgl1; $i <= $tgl2; $i->modify('+1 day')) {
							echo "<td style='text-align:center;' colspan='2'>".$totalAbsenTgl[$i->format("Y-m-d")]."</td>";
						}
					?>
					<td style="text-align: center;">
					<?php
						// Kolom sebelah POJOK KANAN BAWAH
						$totalAbsenPgwAll=0;
						foreach ($totalAbsenPgw as $k => $v) {
							$totalAbsenPgwAll += $totalAbsenPgw[$k];
						}
						echo $totalAbsenPgwAll;
					?>
					</td>
				</tr>
				</tbody>
			</table>
		<?php 
			} else {
				echo "<p style='text-align:center;'>Data masih kosong!</p>";
			} 
		?>
	</div>
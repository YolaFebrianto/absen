<div class="container-fluid" style="overflow-x: scroll;">
	<?php
		$dari='--';$sampai='--';
		if (!empty($this->input->post('dari'))) {
			$dari = @date('d/m/Y',strtotime($this->input->post('dari')));
		}
		if (!empty($this->input->post('sampai'))) {
			$sampai = @date('d/m/Y',strtotime($this->input->post('sampai')));
		}
	?>
	<h2 style="text-align:center;">Laporan Absensi</h2>
	<?php
		if (!empty($this->input->post('dari')) && !empty($this->input->post('sampai'))) {
	?>
	<h5 style="text-align:center;">Tanggal <?=$dari;?> sampai <?=$sampai;?></h5>
	<?php
		}
	?>
	<?php echo form_open('absensi/laporan'); ?>
	<div class="form-group">      	
    	<label>Tanggal Awal</label>
       	<div class="input-group date" data-date="<?php echo @$this->input->post('dari');?>" data-date-format="yyyy-mm">
			<input class="form-control input-sm input-tanggal" type="text" name="dari" placeholder="Tanggal Awal" value="<?php echo @$this->input->post('dari');?>" readonly />
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div>
    <div class="form-group">
    	<label>Tanggal Akhir</label>
       	<div class="input-group date" data-date="<?php echo @$this->input->post('sampai');?>" data-date-format="yyyy-mm">
			<input class="form-control input-sm input-tanggal" type="text" name="sampai" placeholder="Tanggal Akhir" value="<?php echo @$this->input->post('sampai');?>" readonly />
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
    </div>		 
	<div class="form-group">
		<button type="submit" class="btn btn btn-primary btn-sm button-blue" name="btnsubmit"> Tampilkan </button>
		<a href="" class="btn btn btn-primary btn-sm button-blue" name="btnreset"> Clear Data </a>
		<?php
			if (!empty($this->input->post('dari')) AND !empty($this->input->post('sampai'))) {
				$dari = date('Y-m-d',strtotime($this->input->post('dari')));
				$sampai = date('Y-m-d',strtotime($this->input->post('sampai')));
		?>
		<a href="<?php echo base_url('absensi/printPDF/'.$dari.'/'.$sampai); ?>" class="btn btn btn-warning btn-sm button-gray"> Cetak PDF </a>
		<?php
			}
		?>
	</div>
	<?php echo form_close(); ?>
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
		if (count($absensi)>0) { ?>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th rowspan="2" style="text-align:center;vertical-align: middle;">
				<?php
					$dari_bulan = @date('m',strtotime($this->input->post('dari')));
					$sampai_bulan = @date('m',strtotime($this->input->post('sampai')));
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
					// $jarak = $tgl2->diff($tgl1);
					$tglFirst = strtotime($this->input->post('dari'));
					$tglSecond = strtotime($this->input->post('sampai'));

					$jarak = $tglSecond - $tglFirst;

					$hari = $jarak / 60 / 60 / 24;
				?>
				<th colspan="<?=($hari*2)+4;?>" style="text-align:center;">Tanggal <?=@date('d/m/Y',strtotime($this->input->post('dari')));?> sampai <?=@date('d/m/Y',strtotime($this->input->post('sampai')));?>
				</th>
			</tr>
			<tr>
			<?php
				for ($i=$tgl1; $i <= $tgl2; $i->modify('+1 day')) {
					echo "<th style='text-align:center;' colspan='2'>".$arrayHari[$i->format("D")] ."</th>";
				}
			?>
				<th rowspan="3" style="vertical-align: middle;text-align: center;">Total</th>
				<th rowspan="3" style="vertical-align: middle;text-align: center;">Keterangan</th>
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
				foreach ($absensi as $ka => $va) {
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
					$bgcolor='background:#367fa9;';
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
					$bgcolor1='background:#367fa9;';
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
			<td style="text-align: center;">
				<!-- <a href="<?php //echo base_url('absensi/detail/'.$pgw->id.'/'.$dari.'/'.$sampai); ?>">Lihat</a> -->
				<a href="#" class="btn btn-sm btn-default" onclick="detailPgw(<?=$pgw->id;?>,'<?=$dari;?>','<?=$sampai;?>')" data-toggle="modal" data-target="#modalDetail">
					<span class="fa fa-eye"></span> Lihat
				</a>
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
			echo "<h4 style='text-align:center;'><i>Data Masih Kosong!</i></h4>";
		}
	?>
</div>
<p><b>Keterangan : </b></p>
<div style="clear:both;">
	<div style="float:left;width:14px;height:14px;line-height:1.42857143;margin:4px 5px 6px;background-color:#367fa9;"></div>
	<div style="float:left;">
		<p> : Masuk</p>
	</div>
	<div style="float:left;width:14px;height:14px;line-height:1.42857143;margin:4px 5px 6px;background-color:red;"></div>
	<div style="float:left;">
		<p> : Alpha</p>
	</div>
	<div style="float:left;width:14px;height:14px;line-height:1.42857143;margin:4px 5px 6px;background-color:orange;"></div>
	<div style="float:left;">
		<p> : Izin</p>
	</div>
	<div style="float:left;width:14px;height:14px;line-height:1.42857143;margin:4px 5px 6px;background-color:lightgreen;"></div>
	<div style="float:left;">
		<p> : Sakit</p>
	</div>
</div>
<div style="clear: both;"></div>
<a href="<?php echo base_url('pengguna/index'); ?>" class="btn btn-default">Back</a>
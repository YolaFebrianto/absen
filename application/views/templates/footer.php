
				</div>
			</div>
			<?php if (($this->uri->segment(1)=='proform' AND $this->uri->segment(2)=='index') OR $this->uri->segment(1)=='proform' AND $this->uri->segment(2)=='') { ?>
			<div class="box box-primary">
				<div class="box-body">
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
						<?php echo form_open('proform/index'); ?>
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
										$jarak = $tgl2->diff($tgl1);
									?>
									<th colspan="<?=($jarak->d*2)+3;?>" style="text-align:center;">Tanggal <?=@date('d/m/Y',strtotime($this->input->post('dari')));?> sampai <?=@date('d/m/Y',strtotime($this->input->post('sampai')));?></th>
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
								echo "<h4 style='text-align:center;'><i>Data Masih Kosong!</i></h4>";
							}
						?>
					</div>
					<br>
					<a href="<?php echo base_url('pengguna/index'); ?>" class="btn btn-default">Back</a>
				</div>
			</div>
			<?php } ?>
		</section>
		<!-- </section> -->
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url();?>template/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=base_url();?>template/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?=base_url();?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?=base_url();?>template/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url();?>template/dist/js/app.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=base_url();?>template/dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="<?=base_url();?>template/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url();?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
	<?php
		if (!isset($jumlahData)) {
			$jumlahData=0;
		}
		if ($jumlahData>10) {
	?>
			$('#dtTable').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
			$('#dtTable2').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
	<?php
		} else {
	?>
			$('#dtTable').DataTable({
				"paging": false,
				"lengthChange": true,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
			$('#dtTable2').DataTable({
				"paging": false,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
	<?php
		}
	?>
	</script>
	<!-- Date Picker -->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>template/bootstrap/css/bootstrap-datepicker3.css">
	<style type="text/css">
		div.datepicker.dropdown-menu{
			left: 25px !important;
		}
	</style>
	<script src="<?=base_url();?>template/bootstrap/js/bootstrap-datepicker3.js"></script>
	<script type="text/javascript">
	$().ready(function() {
		$(".input-group.date").datepicker({
     		format: "yyyy-mm-dd",
			autoclose: true, 
			todayHighlight: false
		});

		$(".input-tanggal").on('click', function(){
			if ($(this).hasClass('focused')) {
				$(this).parent().datepicker('hide');
			} else {
				$(this).parent().datepicker('show');
			}
			$(this).toggleClass('focused');
		});
		$("span.input-group-addon").on('click', function(){
			if ($(this).hasClass('focused')) {
				$(this).parent().datepicker('hide');
			} else {
				$(this).parent().datepicker('show');
			}
			$(this).toggleClass('focused');
		});
	});	
	</script>
</body>
</html>

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
					    	<label>Tanggal Awal</label>
					       	<div class="input-group date" data-date="<?php echo @$this->input->post('sampai');?>" data-date-format="yyyy-mm">
								<input class="form-control input-sm input-tanggal" type="text" name="sampai" placeholder="Tanggal Akhir" value="<?php echo @$this->input->post('sampai');?>" readonly />
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
					        </div>
					    </div>		 
						<div class="form-group">
							<button type="submit" class="btn btn btn-primary btn-sm button-blue" name="btnsubmit"> Tampilkan </button>
							<a href="" class="btn btn btn-primary btn-sm button-blue" name="btnreset"> Clear Data </a>
							<!-- <a href="#" class="btn btn btn-primary btn-sm button-gray"> Cetak PDF </a> -->
						</div>
						<?php echo form_close(); ?>
						<?php if (count($absensi)>0) { ?>
						<table class="table table-bordered table-striped" id="dtTable2">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Pegawai</th>
									<th>Gaji Harian</th>
									<th>Masuk</th>
									<th>Gaji yang Diterima</th>
								</tr>
							</thead>
							<tbody>
							<?php
								foreach ($absensi as $key => $ab) {
							?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $ab->nama; ?></td>
								<td><?php echo 'Rp. '.@number_format($ab->gaji,0,',','.'); ?></td>
								<td><?php echo @number_format($ab->masuk,1,',','.'); ?></td>
								<td><?php echo 'Rp. '.@number_format($ab->gaji_diterima,0,',','.'); ?></td>
							</tr>
							<?php
								}
							?>
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
<?php require_once APPPATH.'views/templates/header.php'; ?>
<?php if($this->session->flashdata('info') != null): ?>
<div class="alert alert-info alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-info"></i> Alert!</h4>
	<?=$this->session->flashdata('info');?>
</div>
<?php endif; ?>	
<?php if($this->session->flashdata('danger') != null): ?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	<?=$this->session->flashdata('danger');?>
</div>
<?php endif; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-sm-4 col-xs-6">
			<div class="thumbnail">
				<a href="<?php echo base_url('pegawai/form_tambah'); ?>">
					<img src="<?=base_url();?>template/dist/img/form_data_pegawai.png" style="width:100%;max-height:280px;">
					<div class="caption">
						<p style="text-align: center;font-weight:bold;font-size:14px;line-height:14px;height:28px;">Form Data Pegawai</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-4 col-xs-6">
			<div class="thumbnail">
				<a href="<?php echo base_url('pegawai/index'); ?>">
					<img src="<?=base_url();?>template/dist/img/data_pegawai.png" style="width:100%;max-height:280px;">
					<div class="caption">
						<p style="text-align: center;font-weight:bold;font-size:14px;line-height:14px;height:28px;">Data Pegawai</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-4 col-xs-6">
			<div class="thumbnail">
				<a href="<?php echo base_url('absensi/form_tambah'); ?>">
					<img src="<?=base_url();?>template/dist/img/absensi_pegawai.png" style="width:100%;max-height:280px;">
					<div class="caption">
						<p style="text-align: center;font-weight:bold;font-size:14px;line-height:14px;height:28px;">Absensi Pegawai</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-4 col-xs-6">
			<div class="thumbnail">
				<a href="<?php echo base_url('absensi/laporan'); ?>">
					<img src="<?=base_url();?>template/dist/img/laporan.png" style="width:100%;max-height:280px;">
					<div class="caption">
						<p style="text-align: center;font-weight:bold;font-size:14px;line-height:14px;height:28px;">Laporan Absensi</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-4 col-xs-6">
			<div class="thumbnail">
				<a href="<?php echo base_url('proform/index'); ?>">
					<img src="<?=base_url();?>template/dist/img/laporan_hasil_kerja.png" style="width:100%;max-height:280px;">
					<div class="caption">
						<p style="text-align: center;font-weight:bold;font-size:14px;line-height:14px;height:28px;">Laporan Hasil Kerja</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-4 col-xs-6">
			<div class="thumbnail">
				<a href="<?php echo base_url('pengguna/logout'); ?>">
					<img src="<?=base_url();?>template/dist/img/logout.png" style="width:100%;max-height:280px;">
					<div class="caption">
						<p style="text-align: center;font-weight:bold;font-size:14px;line-height:14px;height:28px;">Logout</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<?php require_once APPPATH.'views/templates/footer.php'; ?>
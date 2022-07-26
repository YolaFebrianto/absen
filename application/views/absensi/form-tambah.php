<?php require_once APPPATH.'views/templates/header.php'; ?>
<?= form_open_multipart('absensi/tambah'); ?>
	<div class="form-group">
		<label>Nama Pegawai :</label>
		<select name="id_pegawai" class="form-control" required="">
			<option value="" selected="" disabled="">-- Pilih --</option>
			<?php foreach ($pegawai as $k => $v) { ?>
			<option value="<?php echo $v->id; ?>"><?php echo $v->nama; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Keterangan :</label>
		<select name="keterangan" class="form-control">
			<option value="" selected="">Hadir</option>
			<option value="A">Alpha</option>
			<option value="I">Izin</option>
			<option value="S">Sakit</option>
		</select>
	</div>
	<div class="form-group">
		<label>Kat. Absen :</label>
		<select name="kategori" class="form-control" required="">
			<option value="" selected="" disabled="">-- Pilih --</option>
			<option value="pagi">Absen Pagi</option>
			<option value="siang">Absen Siang</option>
		</select>
	</div>
	<a href="<?php echo base_url('pengguna/index'); ?>" class="btn btn-default pull-left">Back</a>
	<input type="submit" name="tambah" value="Save" class="btn btn-default pull-right">
<?= form_close(); ?>
<?php require_once APPPATH.'views/templates/footer.php'; ?>
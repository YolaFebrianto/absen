<?= form_open_multipart('pegawai/tambah'); ?>
	<div class="form-group">
		<label>Nama Pegawai :</label>
		<input type="text" name="nama" class="form-control" required>	
	</div>
	<div class="form-group">
		<label>Alamat :</label>
		<textarea name="alamat" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label>No. HP :</label>
		<input type="number" name="telp" class="form-control" min="0" required>	
	</div>
	<div class="form-group">
		<label>Gaji :</label>
		<input type="number" name="gaji" class="form-control" min="0" value="0" required>	
	</div>
	<a href="<?php echo base_url('pengguna/index'); ?>" class="btn btn-default pull-left">Back</a>
	<input type="submit" name="tambah" value="Save" class="btn btn-default pull-right">
<?= form_close(); ?>
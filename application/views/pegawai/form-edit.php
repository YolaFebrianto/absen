<?php require_once APPPATH.'views/templates/header.php'; ?>
<?= form_open_multipart('pegawai/edit/'.$id); ?>
	<div class="form-group">
		<label>Nama Pegawai :</label>
		<input type="text" name="nama" class="form-control" value="<?=$isi['nama'];?>" required>
	</div>
	<div class="form-group">
		<label>Alamat :</label>
		<textarea name="alamat" class="form-control"><?=$isi['alamat'];?></textarea>
	</div>
	<div class="form-group">
		<label>No. HP :</label>
		<input type="number" name="telp" class="form-control" min="0" value="<?=$isi['telp'];?>" required>	
	</div>
	<div class="form-group">
		<label>Gaji :</label>
		<input type="number" name="gaji" class="form-control" min="0" value="<?=$isi['gaji'];?>" required>	
	</div>
	<a href="<?php echo base_url('pegawai/index'); ?>" class="btn btn-default pull-left">Back</a>
	<input type="submit" name="edit" value="Save" class="btn btn-default pull-right">
<?= form_close(); ?>
<?php require_once APPPATH.'views/templates/footer.php'; ?>
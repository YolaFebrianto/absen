<?= form_open_multipart('proform/tambah'); ?>
	<div class="form-group">
		<label>Tanggal Kirim :</label>
       	<div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
			<input class="form-control input-sm input-tanggal" type="text" name="deadline" placeholder="Tanggal Kirim" required readonly />
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
	</div>
	<div class="form-group">
		<label>Jenis Tas yang Dikirim :</label>
		<input type="text" name="nama_pesanan" class="form-control" required>	
	</div>
	<div class="form-group">
		<label>Jumlah (dalam pcs) :</label>
		<input type="number" name="jumlah" class="form-control" min="0" value="0" required>	
	</div>
	<div class="form-group">
		<label>Prospek :</label>
		<div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
			<input class="form-control input-sm input-tanggal" type="text" name="deadline_penyelesaian" placeholder="Prospek" required readonly />
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>	
	</div>
	<div class="form-group">
		<label>Status (%) :</label>
		<input type="number" name="status" class="form-control" min="0" max="100" value="0" required>
	</div>
	<a href="<?php echo base_url('proform/index'); ?>" class="btn btn-default pull-left">Back</a>
	<input type="submit" name="tambah" value="Save" class="btn btn-default pull-right">
<?= form_close(); ?>
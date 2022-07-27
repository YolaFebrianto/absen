<?= form_open_multipart('proform/edit/'.$id); ?>
	<div class="form-group">
		<label>Tanggal Kirim :</label>
       	<div class="input-group date" data-date="<?=date('Y-m-d',strtotime($isi['deadline']));?>" data-date-format="yyyy-mm-dd">
			<input class="form-control input-sm input-tanggal" type="text" name="deadline" placeholder="Tanggal Kirim" required readonly value="<?=date('Y-m-d',strtotime($isi['deadline']));?>" />
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
	</div>
	<div class="form-group">
		<label>Jenis Tas yang Dikirim :</label>
		<input type="text" name="nama_pesanan" class="form-control" value="<?=$isi['nama_pesanan'];?>" required>	
	</div>
	<div class="form-group">
		<label>Jumlah (dalam pcs) :</label>
		<input type="number" name="jumlah" class="form-control" min="0" value="<?=$isi['jumlah'];?>" required>	
	</div>
	<div class="form-group">
		<label>Prospek :</label>
       	<div class="input-group date" data-date="<?=date('Y-m-d',strtotime($isi['deadline_penyelesaian']));?>" data-date-format="yyyy-mm-dd">
			<input class="form-control input-sm input-tanggal" type="text" name="deadline_penyelesaian" placeholder="Prospek" required readonly value="<?=date('Y-m-d',strtotime($isi['deadline_penyelesaian']));?>" />
			<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
        </div>
	</div>
	<div class="form-group">
		<label>Status (%) :</label>
		<input type="number" name="status" class="form-control" min="0" max="100" value="<?=@number_format($isi['status'],0,',','.');?>" required>
	</div>
	<a href="<?php echo base_url('proform/index'); ?>" class="btn btn-default pull-left">Back</a>
	<input type="submit" name="edit" value="Save" class="btn btn-default pull-right">
<?= form_close(); ?>
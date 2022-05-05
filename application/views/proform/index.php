<?php require_once APPPATH.'views/templates/header.php'; ?>
<div class="container-fluid" style="overflow-x: scroll;">
	<div>
		<a href="<?php echo base_url('proform/form_tambah'); ?>" class="btn btn-info pull-left">Form Data Proform</a>
		<p class="pull-right" style="font-size:14px;font-weight:400;line-height:1.42857143;padding:6px 12px;">Tanggal : <?php echo date('d/m/Y'); ?></p>
	</div>
	<div style="clear: both;"></div>
	<?php if (count($isi)>0) { ?>
	<table class="table table-bordered table-striped" id="dtTable">
		<thead>
			<tr>
				<th>Tanggal Kirim</th>
				<th>Jenis yang Dikirim</th>
				<th>Jumlah</th>
				<th>Prospek</th>
				<th>Status</th>
				<th width="180">Opsi</th>
			</tr>
		</thead>
		<tbody>
	<?php
		foreach ($isi as $k => $v) {
			$deadline = '';
			if (!empty($v->deadline)) {
				$deadline = date('d/m/Y',strtotime($v->deadline));
			}
			$deadline_penyelesaian = '';
			if (!empty($v->deadline_penyelesaian)) {
				$deadline_penyelesaian = date('d/m/Y',strtotime($v->deadline_penyelesaian));
			}
	?>
		<tr>
			<td><?php echo $deadline; ?></td>
			<td><?php echo $v->nama_pesanan; ?></td>
			<td><?php echo @number_format($v->jumlah,0,',','.'); ?> pcs</td>
			<td><?php echo $deadline_penyelesaian; ?></td>
			<td><?php echo @number_format($v->status,0,',','.'); ?>%</td>
			<td>
				<a href="<?php echo base_url('proform/form_edit/'.$v->id); ?>" class="btn btn-success">Edit</a>
				<a href="<?php echo base_url('proform/hapus/'.$v->id); ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
			</td>
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
<?php require_once APPPATH.'views/templates/footer.php'; ?>
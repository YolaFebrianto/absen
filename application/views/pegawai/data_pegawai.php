<?php require_once 'header.php'; ?>
<div style="overflow-x: scroll;">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Alamat</th>
			<!-- <th>No. HP</th>
			<th>Gaji</th> -->
			<th width="180">Opsi</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach ($isi as $k => $v) {
?>
	<tr>
		<td><?php echo $v->nama; ?></td>
		<td><?php echo $v->alamat; ?></td>
		<!-- <td><?php //echo $v->telp; ?></td>
		<td><?php //echo 'Rp. '.number_format($v->gaji,0,',','.'); ?></td> -->
		<td>
			<a href="<?php echo base_url('pengguna/form_detail_pegawai/'.$v->id); ?>" class="btn btn-warning">Detail</a>
			<a href="<?php echo base_url('pengguna/form_edit_pegawai/'.$v->id); ?>" class="btn btn-success">Edit</a>
			<a href="<?php echo base_url('pengguna/hapus_pegawai/'.$v->id); ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
		</td>
	</tr>
<?php
	}
?>
	</tbody>
</table>
</div>
<br>
<a href="<?php echo base_url('pengguna/index'); ?>" class="btn btn-default">Back</a>
<?php require_once 'footer.php'; ?>
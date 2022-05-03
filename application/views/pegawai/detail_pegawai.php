<?php require_once 'header.php'; ?>
<div style="overflow-x: scroll;">
<table class="table table-bordered table-striped">
	<tbody>
		<tr>
			<th>Nama</th>
			<td><?php echo $isi['nama']; ?></td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td><?php echo $isi['alamat']; ?></td>			
		</tr>
		<tr>
			<th>No. HP</th>
			<td><?php echo $isi['telp']; ?></td>
		</tr>
		<tr>
			<th>Gaji</th>
			<td><?php echo 'Rp. '.number_format($isi['gaji'],0,',','.'); ?></td>
		</tr>
	</tbody>
</table>
</div>
<br>
<a href="<?php echo base_url('pengguna/data_pegawai'); ?>" class="btn btn-default">Back</a>
<?php require_once 'footer.php'; ?>
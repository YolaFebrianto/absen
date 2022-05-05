<?php require_once APPPATH.'views/templates/header.php'; ?>
<div class="container-fluid" style="overflow-x: scroll;">
	<?php if (count($isi)>0) { ?>
	<table class="table table-bordered table-striped" id="dtTable">
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
				<a href="<?php echo base_url('pegawai/detail/'.$v->id); ?>" class="btn btn-warning">Detail</a>
				<a href="<?php echo base_url('pegawai/form_edit/'.$v->id); ?>" class="btn btn-success">Edit</a>
				<a href="<?php echo base_url('pegawai/hapus/'.$v->id); ?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
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
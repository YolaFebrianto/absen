	<title>Laporan Absensi</title>
	<style type="text/css">
	.container-fluid{
		font-family: sans-serif;
	}
	table {
		border-spacing: 0;
		border-collapse: collapse;
		background-color: transparent;
		margin: 10px 0;
		text-align: center;
	}
	.table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
	}
	.table-bordered th,
	.table-bordered td {
		border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > tbody > tr > th,
	.table-bordered > thead > tr > td,
	.table-bordered > tbody > tr > td,{
		border: 1px solid #ddd;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > thead > tr > td {
		border-bottom-width: 2px;
	}
	h4{
		font-size: 18px;
	}
	img{
		width: 100%;
	}
	</style>
	<div class="container-fluid">
		<h2 style="text-align: center;margin:0;padding:0;font-size:22px;line-height:1.5;">
			<b>Laporan Absensi</b>
		</h2>
		<h5 style="text-align: center;margin:0;padding:0;font-size:14px;line-height:1.5;">
			Periode <?php echo date('d/m/Y',strtotime($dari)); ?> sampai <?php echo date('d/m/Y',strtotime($sampai)); ?>
		</h5>
		<br>
		<?php
			if ($cetak != null) { 
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Pegawai</th>
					<th>Gaji Harian</th>
					<th>Masuk</th>
					<th>Gaji yang Diterima</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no=1;
					foreach ($cetak as $ctk): 
				?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $ctk->nama; ?></td>
						<td><?= 'Rp. '.@number_format($ctk->gaji,2,',','.'); ?></td>
						<td><?= @number_format($ctk->masuk,2,',','.'); ?></td>
						<td><?= 'Rp. '.@number_format($ctk->gaji_diterima,2,',','.'); ?></td>
					</tr>
				<?php 
					endforeach;
				?>
			</tbody>
		</table>
		<?php 
			} else {
				echo "<p style='text-align:center;'>Data rekap masih kosong!</p>";
			} 
		?>
	</div>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyAnimeWatchList</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<style type="text/css">
	body{
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
</head>
<body>
	<div class="container-fluid">
		<h4 style="text-align: center;">
			<b>MyAnimeWatchList (<?=@$user['username'];?>)</b>
		</h4>
		<?php
			if ($cetak != null) { 
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Judul</th>
					<th>Season</th>
					<th>Tahun</th>
					<th>Status</th>
					<th>Platform</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no=1;
					foreach ($cetak as $ctk): 
				?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $ctk->judul; ?></td>
						<td><?php
							if ($ctk->season==1) {
								echo "Winter";
							} else if ($ctk->season==2) {
								echo "Spring";
							} else if ($ctk->season==3) {
								echo "Summer";
							} else if ($ctk->season==4) {
								echo "Fall";
							} else { echo "-"; }
						?></td>
						<td><?= $ctk->tahun; ?></td>
						<td><?php
							if ($ctk->status==0) {
								echo "SCHEDULE";
							} else if ($ctk->status==1) {
								echo "ONGOING";
							} else if ($ctk->status==2) {
								echo "FINISHED";
							} else { echo "-"; }
						?></td>
						<td>
							<?= $ctk->platform; ?>
						</td>
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
</body>
</html>
<h3>Tanggal <?php echo date('d/m/Y',strtotime($dari)); ?> sampai <?php echo date('d/m/Y',strtotime($sampai)); ?></h3>
<table class="table table-bordered table-striped">
	<tbody>
		<tr>
			<th style="width:100px;">Nama</th>
			<td><?php echo $isi['nama']; ?></td>
		</tr>
		<tr>
			<th style="width:100px;">Absen</th>
			<td><?php echo number_format($isi['masuk'],1,'.',','); ?> hari</td>
		</tr>
		<tr>
			<th style="width:100px;">Sakit</th>
			<td><?php echo number_format($isi['sakit'],1,'.',','); ?> hari</td>
		</tr>
		<tr>
			<th style="width:100px;">Izin</th>
			<td><?php echo number_format($isi['izin'],1,'.',','); ?> hari</td>
		</tr>
		<tr>
			<th style="width:100px;">Alpha</th>
			<?php
				$alpha = $isi['selisih']-$isi['masuk']-$isi['sakit']-$isi['izin'];
			?>
			<td><?php echo $alpha; ?> hari</td>
		</tr>
		<!-- <tr> -->
			<!-- <th style="width:100px;">Hari Kerja</th> -->
			<!-- <td><?php //echo $isi['selisih']; ?> hari</td> -->
		<!-- </tr> -->
	</tbody>
</table>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistem Penilaian Karyawan</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/font-awesome.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>template/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url();?>template/dist/css/skins/_all-skins.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/datatables/dataTables.bootstrap.css">
	<style type="text/css">
		div.disclaimer{
		    display: none;
		}
		.datepicker{
z-index: 1100 !important;
}
#ui-datepicker-div {
width: 30% !important;
}
	</style>
</head>
<body class="hold-transition skin-blue-light layout-top-nav">
	<header class="main-header">
		<nav class="navbar navbar-static-top">
			<div class="container" style="width: 100%;">
				<div class="navbar-header" style="width: 100%;">
					<a href="<?=base_url();?>" class="navbar-brand" style="width:100%;text-align: left;">
						<?php
							if (!empty($title)) {
								echo $title;
							} else {
								echo "HOME PAGE";
							}
						?>
					</a>
				</div>
			</div>
		</nav>
	</header>
	<div class="content-wrapper">
		<!-- <section class="content"> -->
		<!-- <section class="content-header"> -->
			<!-- <h1> -->
				<?php
					// if (!empty($title)) {
					// 	echo $title;
					// } else {
					// 	echo "HOME PAGE";
					// }
				?>
				<!-- <div style="clear:both"></div> -->
			<!-- </h1> -->
		<!-- </section> -->

		<section class="content">
			<div class="box box-primary">
				<div class="box-body" style="overflow-x:scroll;">
					<?php if($this->session->flashdata('info') != null): ?>
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-info"></i> Alert!</h4>
						<?=$this->session->flashdata('info');?>
					</div>
					<?php endif; ?>	
					<?php if($this->session->flashdata('danger') != null): ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						<?=$this->session->flashdata('danger');?>
					</div>
					<?php endif; ?>
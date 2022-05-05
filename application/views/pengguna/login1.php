<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Absen | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/css/font-awesome.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>template/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url();?>template/plugins/iCheck/square/blue.css">
	<style type="text/css">
		#notif{
			background-color:#dd4b39;
			color:#fff;
			padding:6px 12px;
			font-size:14px;
		}
		div.disclaimer{
		    display: none;
		}
	</style>
</head>
<body  class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href=""><b>Login</b> Pengguna</a>
		</div>

		<div class="login-box-body">
			<p class="login-box-msg">Login ke Sistem</p>
			<?= form_open('pengguna/login',['style'=>'margin-bottom:-15px;']) ?>
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4">
						<input type="submit" name="btnlogin" class="btn btn-primary btn-block btn-flat" value="Login">
					</div>
				</div>
			<?= form_close(); ?>	
			<br>
			<div class="social-auth-links text-center">
				<?php if($this->session->flashdata('error') != ''): ?>
				<p id="notif">
					<?= $this->session->flashdata('error'); ?>
				</p>
				<?php endif; ?>
			</div>
		</div>	
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url();?>template/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=base_url();?>template/bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?=base_url();?>template/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
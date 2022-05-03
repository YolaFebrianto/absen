<!DOCTYPE html>
<html lang="en">
<head>
	<title>Absen | Log in</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/login/css/font-awesome-4.7.0.min.css">
	<link rel="stylesheet" href="<?=base_url();?>template/bootstrap/login/css/style.css">
	<style type="text/css">
		#notif{
			background-color:red;
			color:#fff;
			font-size:24px;
			line-height: 1.6;
		}
		div.disclaimer{
		    display: none;
		}
	</style>
</head>
<body>
	<section class="ftco-section">
		<div class="container">
			<?php if($this->session->flashdata('error') != ''): ?>
			<div class="row justify-content-center">
				<div class="col-md-5 text-center mb-5">
					<h6 class="heading-section" id="notif">
						<?php echo $this->session->flashdata('error'); ?>
					</h6>
				</div>
			</div>
			<?php endif; ?>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">LOGIN</h3>
						<?= form_open('pengguna/login',['class'=>'login-form']) ?>
							<div class="form-group">
								<input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
							</div>
							<!-- <div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
							</div> -->
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">LOGIN</button>
							</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?=base_url();?>template/bootstrap/login/js/jquery.min.js"></script>
	<script src="<?=base_url();?>template/bootstrap/login/js/popper.js"></script>
	<script src="<?=base_url();?>template/bootstrap/login/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>template/bootstrap/login/js/main.js"></script>

</body>
</html>


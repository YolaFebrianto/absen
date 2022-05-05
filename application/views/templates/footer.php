
				</div>
			</div>
		</section>
		<!-- </section> -->
	</div>

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url();?>template/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=base_url();?>template/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?=base_url();?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?=base_url();?>template/plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url();?>template/dist/js/app.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=base_url();?>template/dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="<?=base_url();?>template/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url();?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<?php
		if (!isset($jumlahData)) {
			$jumlahData=0;
		}
		if ($jumlahData>10) {
	?>
	<script>
		$('#dtTable').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": true,
		});
	</script>
	<?php
		} else {
	?>
	<script>
		$('#dtTable').DataTable({
			"paging": false,
			"lengthChange": true,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": true,
		});
	</script>
	<?php
		}
	?>
	<!-- Date Picker -->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>template/bootstrap/css/bootstrap-datepicker3.css">
	<style type="text/css">
		div.datepicker.dropdown-menu{
			left: 25px !important;
		}
	</style>
	<script src="<?=base_url();?>template/bootstrap/js/bootstrap-datepicker3.js"></script>
	<script type="text/javascript">
	$().ready(function() {
		$(".input-group.date").datepicker({
     		format: "yyyy-mm-dd",
			autoclose: true, 
			todayHighlight: false
		});

		$(".input-tanggal").on('click', function(){
			if ($(this).hasClass('focused')) {
				$(this).parent().datepicker('hide');
			} else {
				$(this).parent().datepicker('show');
			}
			$(this).toggleClass('focused');
		});
		$("span.input-group-addon").on('click', function(){
			if ($(this).hasClass('focused')) {
				$(this).parent().datepicker('hide');
			} else {
				$(this).parent().datepicker('show');
			}
			$(this).toggleClass('focused');
		});
	});	
	</script>
</body>
</html>
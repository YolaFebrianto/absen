
				</div>
			</div>
			
		</section>
		<!-- </section> -->
	</div>

	<!-- Modal -->
	<div class="modal fade bd-example-modal-md" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
	  <div class="vertical-alignment-helper">
	    <div class="modal-dialog modal-md vertical-align-center" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title" id="modalDetailLabel" style="text-align:center;">
	            Detail Absensi Pegawai
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </h4>
	        </div>
	        <div class="modal-body">
	          <!-- <p style="text-align:center;font-weight:bold;">
	            Tanggal <span id="dariTgl"></span> sampai <span id="sampaiTgl"></span>
	          </p> -->
	          <div id="modelDetailBody"></div>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">
	            <span class="fa fa-times"></span> Tutup
	          </button>
	        </div>
	      </div>
	    </div>
	  </div>
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
	<script>
	<?php
		if (!isset($jumlahData)) {
			$jumlahData=0;
		}
		if ($jumlahData>10) {
	?>
			$('#dtTable').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
			$('#dtTable2').DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
	<?php
		} else {
	?>
			$('#dtTable').DataTable({
				"paging": false,
				"lengthChange": true,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
			$('#dtTable2').DataTable({
				"paging": false,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true,
			});
	<?php
		}
	?>
	</script>
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
	function detailPgw(id_pegawai,dari,sampai){
		$('span#dariTgl').html(dari);
		$('span#sampaiTgl').html(sampai);
		$.ajax({
            'method': 'GET',
            'url': "<?=base_url().'absensi/detail';?>",
            'data': {id_pegawai:id_pegawai, dari: dari, sampai: sampai},
            'success': function(data){
                $('#modelDetailBody').html(data);
            }
        });
		// $('#setujuiYes').attr('href','<?=base_url();?>user/edit_status/'+id+'/3');
	}
	</script>
</body>
</html>

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
	<script src="<?=base_url();?>template/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=base_url();?>template/dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="<?=base_url();?>template/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url();?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#add').on('click',function(){
			$.ajax({
				'url': "<?=base_url().'pengguna/form-add'; ?>",
				'method': 'post',
				'data': 'id_kategori=<?=$id_kategori;?>',
				'success': function(data){
					$('.box-body').html(data);
					$('#add').css('display','none');
					$('#cancel').css('display','inline-block');
				}
			});
		});
		function edit(id){
			$.ajax({
				'url': "<?=base_url().'pengguna/form-edit'; ?>",
				'method': 'post',
				'data': 'id='+id,
				'success': function(data){
					$('.box-body').html(data);
					$('#add').css('display','none');
					$('#cancel').css('display','inline-block');
				}
			});
		}
		function nextEps(id){
			$.ajax({
				'url': "<?=base_url('pengguna/nextEps');?>",
				'method': 'post',
				'data': 'id='+id,
				'success': function(data){
					$('#lastEps-'+id).html(data);
				}
			});
		}
		function view(id){
			$.ajax({
				'url': "<?=base_url().'pengguna/view'; ?>",
				'method': 'post',
				'data': 'id='+id,
				'success': function(data){
					$('.box-body').html(data);
					$('#cancel').html('<i class="fa fa-times"></i> Kembali');
					$('#cancel').css('display','inline-block');
				}
			});
		}
		$('#navbar-search-input').on('keyup',function(){
			$.ajax({
				'url': "<?=base_url().'pengguna/cari'; ?>",
				'method': 'post',
				'data': 'cari='+$(this).val(),
				'success': function(data){
					$('tbody').html(data);
					$('center').css('display','none');
				}
			});
		});
	</script>
</body>
</html>
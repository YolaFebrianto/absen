<div class="container-fluid" style="overflow-x: scroll;">
	<?php
		$arrQtyMonth=[];
		foreach ($isi as $k => $v) {
			$arrQtyMonth[$v->YEAR."-".$v->MONTH] = $v->total;
		}
	?>
	<div class="chart" id="line-chart" style="height: 300px;min-width: 300px;"></div>
	<br>
	<a href="<?php echo base_url('proform/index'); ?>" class="btn btn-default">Back</a>
	<script src="<?=base_url();?>template/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?=base_url();?>template/plugins/morris/raphael-min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>template/plugins/morris/morris.min.js"></script>
	<script type="text/javascript">
		const d = new Date();
		// let name = month[d.getMonth()];
		function GetMonthNum(monthNumber) {
			var yearNumber;
			if (monthNumber>=-1) {
				monthNumber = monthNumber < 0 ? 11 : monthNumber;
				yearNumber = new Date().getFullYear();
			} else {
				monthNumber = 11 + (monthNumber+1);
				yearNumber = new Date().getFullYear()-1;
			}
			const months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
			return months[monthNumber]+" "+yearNumber;
			// monthNumber=monthNumber+1;
			// return yearNumber+"-"+monthNumber;
		}
		var nowmonth = d.getMonth(); 
		var month7 = GetMonthNum(nowmonth-7);
		var month6 = GetMonthNum(nowmonth-6);
		var month5 = GetMonthNum(nowmonth-5);
		var month4 = GetMonthNum(nowmonth-4);
		var month3 = GetMonthNum(nowmonth-3);
		var month2 = GetMonthNum(nowmonth-2);
		var month1 = GetMonthNum(nowmonth-1);
		var month0 = GetMonthNum(nowmonth);
		// LINE CHART
		var line = new Morris.Line({
	      element: 'line-chart',
	      resize: true,
	      data: [
	        {bulan: month7, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m',strtotime('-7 month'))])?0:$arrQtyMonth[date('Y-m',strtotime('-7 month'))];?>'},
	        {bulan: month6, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m',strtotime('-6 month'))])?0:$arrQtyMonth[date('Y-m',strtotime('-6 month'))];?>'},
	        {bulan: month5, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m',strtotime('-5 month'))])?0:$arrQtyMonth[date('Y-m',strtotime('-5 month'))];?>'},
	        {bulan: month4, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m',strtotime('-4 month'))])?0:$arrQtyMonth[date('Y-m',strtotime('-4 month'))];?>'},
	        {bulan: month3, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m',strtotime('-3 month'))])?0:$arrQtyMonth[date('Y-m',strtotime('-3 month'))];?>'},
	        {bulan: month2, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m',strtotime('-2 month'))])?0:$arrQtyMonth[date('Y-m',strtotime('-2 month'))];?>'},
	        {bulan: month1, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m',strtotime('-1 month'))])?0:$arrQtyMonth[date('Y-m',strtotime('-1 month'))];?>'},
	        {bulan: month0, jumlah: '<?php echo @empty($arrQtyMonth[date('Y-m')])?0:$arrQtyMonth[date('Y-m')];?>'}
	      ],
	      xkey: 'bulan',
	      ykeys: ['jumlah'],
	      labels: ['Jumlah'],
	      lineColors: ['#3c8dbc'],
	      hideHover: 'auto',
	      parseTime: false
	    });
	</script>
</div>
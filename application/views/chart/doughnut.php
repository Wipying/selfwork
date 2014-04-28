<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome!</title>
	<link href="/torrang/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/torrang/public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<script src="/torrang/public/jquery/jquery.js"></script>
	<script src="/torrang/public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php $this->load->view('common/header') ?>
	<div class="container">
		<hr class="soften">
		<script src="/torrang/public/chart/highcharts.js"></script>
		<script src="/torrang/public/chart/exporting.js"></script>
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto">
		</div>
		<script>
			$(function() {
				// Create the chart
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						type: 'pie'
					},
					title: {
						text: 'Doughnut chart'
					},
					yAxis: {
						title: {
							text: ''
						}
					},
					plotOptions: {
						pie: {
							shadow: false
						}
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					series: [{
						name: 'Browsers',
						data: [["RESIDENTIAL",64.2],["MULTIFAMILY",3.85],["OFFICE",3.85],["RETAIL",7.69]],
						size: '100%',
						innerSize: '80%',
						showInLegend:true,
						dataLabels: {
							formatter: function() {
								return this.y > 1 ? '<b>'+ this.point.name +':</b> '+ this.y +'%'  : null;
							}
						}
					}]
				});
			});
		</script>
	</div>
</body>
</html>
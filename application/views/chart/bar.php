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
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
		<script>
			$(function () {
				$('#container').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: 'Bar Chart'
					},
					subtitle: {
						text: ''
					},
					xAxis: {
						categories: [
							'Jan',
							'Feb',
							'Mar',
							'Apr',
							'May',
							'Jun',
							'Jul',
							'Aug',
							'Sep',
							'Oct',
							'Nov',
							'Dec'
						]
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Rainfall (mm)'
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
							'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
						footerFormat: '</table>',
						shared: true,
						useHTML: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [{
						name: 'Tokyo',
						data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
			
					}]
				});
			});
			

				


		</script>
	</div>
</body>
</html>
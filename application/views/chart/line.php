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
						type: 'area'
					},
					title: {
						text: 'Line Chart'
					},
					subtitle: {
						text: ''
					},
					xAxis: {
						categories: ['1750', '1800', '1850', '1900', '1950', '1999', '2050'],
						tickmarkPlacement: 'on',
						title: {
							enabled: false
						}
					},
					yAxis: {
						title: {
							text: 'Billions'
						},
						labels: {
							formatter: function() {
								return this.value / 1000;
							}
						}
					},
					tooltip: {
						shared: true,
						valueSuffix: ' millions'
					},
					plotOptions: {
						area: {
							stacking: 'normal',
							lineColor: '#666666',
							lineWidth: 1,
							marker: {
								lineWidth: 1,
								lineColor: '#666666'
							}
						}
					},
					series: [{
						name: 'Asia',
						data: [502, 635, 809, 947, 1402, 3634, 5268]
					}]
				});
			});
			

		</script>
	</div>
</body>
</html>
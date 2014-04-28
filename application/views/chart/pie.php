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
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'FUNDING OVERVIEW'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								format: '<b>{point.name}</b><BR>: {point.percentage:.1f} %'
							}
						}
					},
					series: [{
						type: 'pie',
						name: 'Sample',
						data: [
							['EQUITY',      50],
							['DEBT',   50]
						]
					}]
				});
			});
				


		</script>
	</div>
</body>
</html>
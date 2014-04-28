<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome!</title>
	<link href="/torrang/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/torrang/public/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<script src="/torrang/public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php $this->load->view('common/header') ?>
	<div class="container">
		<br><br>
		<h1>Geographical Chart</h1>
		<hr class="soften">
		

		<script src="/torrang/public/jquery/jquery.js"></script>
		
		
		<script src="/torrang/public/chart/highmaps.js"></script>
		<script src="/torrang/public/chart/data.src.js"></script>
		<script src="/torrang/public/chart/map-parser.src.js"></script>
		
		<!--
		<script src="http://code.highcharts.local/highmaps.js"></script>
		<script src="http://code.highcharts.local/modules/data.src.js"></script>
		<script src="http://code.highcharts.local/modules/map-parser.src.js"></script>
		-->
		
		<!-- 3. Add the JavaScript to initialize the chart on document ready -->
		<script src="/torrang/public/chart/map-from-svg.js"></script>
		<script type="text/javascript">
		
			
			var chart,
				file,
				$current;
				
			// Some maps, like USA and France, have separator lines in between paths. We want to 
			// identify those and assign to a separate series
			function identifyLines(data, key) {
				var lines = [],
					i,
					point;
				
				for (i = 0; i < data.length; i++) {
					point = data[i];
					if (!point.hasFill) {
						lines.push(data.splice(i, 1)[0]);
						i -= 1;
					}
				}
				return lines;
			}
			
			function drawMap(key, file) {
				location.hash = '#' + file;
				var start = +new Date();
				if (chart) {
					chart = chart.destroy();
				}
				$('#container').html('');
				file = file || maps[key];
				Highcharts.data({
					//svg: '/maps/file.php?file=' + file,
					svg: file,
					complete: function (options) {

						console.log('Loading and parsing map:', new Date() - start, 'ms');
						start = +new Date();

						var data = options.series[0].data,
							lines = identifyLines(data, key);
							
						// For the sake of the demo, add some random values
						$.each(data, function (i, point) {
							data[i] = {
								y: Math.round(Math.random() * 100),
								path: point.path,
								name: point.name,
								hasFill: point.hasFill
							};
						});
						
						// Merge the options from the Data module with our own settings
						options = Highcharts.merge(options, {
							chart : {
								renderTo : 'container',
								borderWidth : 1,
								events: {
									load: function () {
										console.log('Generating chart:', new Date() - start, 'ms');
									}
								}
							},
							
							title: {
								text: key
							},
							
							legend: {
								enabled: false
							},

							mapNavigation: {
								enabled: true
							},
						
							plotOptions: {
								map: {
									name: 'Random',
									colorRange: {
										from: '#cedae8',
										to: '#1a416d'
									},
									dataLabels: {
										//enabled: true,
										format: '{point.name}',
										backgroundColor: 'rgba(255,255,255,0.4)'
									},
									tooltip: {
										valueSuffix: '%'
									},
									states: {
										hover: {
											color: '#bada55'
										}
									}
								}
							}
						});
						
						// Add separator lines
						if (lines && lines.length) {
							options.series.push({
								type: 'mapline',
								enableMouseTracking: false,
								showInLegend: false,
								data: lines
							});	
						}
						
						
						
						// View data
						var mapData = [];
						$.each(options.series, function (i, series) {
							var data = [];

							mapData[i] = {};

							$.each(series.data, function (j, point) {
								if (!mapData[i].type) {
									if (point.hasFill) {
										mapData[i].type = 'map';
									} else {
										mapData[i].type = 'mapline';
									}
										
								}
								data[j] = {
									name: point.name,
									path: point.path
								};
							});
							mapData[i].data = Highcharts.Data.prototype.pathToString(data)
						});
						
						mapData = JSON.stringify(mapData, null, "\t");
						$('#view-data')
							.html('View data (' + Highcharts.numberFormat(mapData.length / 1024, 1, '.') + ' kB)')
							.click(function () {
								if (chart) {
									chart = chart.destroy();
								}
								$('#container').html(
									'<div style="font-family:courier new;font-size: 0.8em; color: green;"><pre>' + 
										mapData + '</pre></div>'
								);
							});



						// Create the map
						chart = new Highcharts.Map(options);
					}
				});
				
				
							
				// Mark the current map
				if ($current) {
					$current.removeClass('current');
				}
				if (key) {
					$current = $('#' + key + '_');
					$current.addClass('current');
				}
				
				// View SVG
				$('#view-svg')[0].href = file;
				
				
			}
				
			

		</script>
		
		<style>
			
			
			
			#links a:hover {
				border-color: gray !important;
			}
			#links a.current {
				border: 1px solid silver;
				background: #bada55;
			}
			
			label {
				width: 45%;
				display: inline-block;
			}
			input, select {
				width: 45%;
			}
		</style>

		<div style="width: 1200px; margin: auto">
			<div style="width: 370px;margin-right: 10px;float: left">
				
				<label for="preset">Load preset: </label>
				<select id="preset"></select>
				
				<label style="width: 100%">Online SVG URL or SVG markup:</label>
				<textarea id="load" style="width: 330px;" rows="3" ></textarea>
				<div id="series-setup"></div>
				<input type="submit" value="Load" id="load-submit" />
				<hr/>
				<div class="buttons">
					<a id="view-svg" target="_blank">View SVG</a>
					<a id="view-data" target="_blank" href="javascript:;">View data</a>
				</div>
			</div>
			<div id="container" style="width: 800px; height: 550px; float: left; overflow: auto"></div>
			
		</div>
    </div>
</body>
</html>
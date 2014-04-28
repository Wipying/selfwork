



var presets = [{
	name: '',
	url: ''
}, {
	name: 'Africa',
	url: '/torrang/public/chart/africa.svg'
}, {
	name: 'Europe',
	url: '/torrang/public/chart/europe.svg'
}, { 
	name: 'World',
	url: '/torrang/public/chart/world.svg'
}];
/*
var defaultSeriesSetup = [{
	name: 'Areas',
	type: 'map',
	enableMouseTracking: true,
	showInLegend: true,
	rules: [{
		key: 'fill',
		operator: 'is-not',
		value: 'none'
	}]
}, {
	name: 'Lines',
	type: 'mapline',
	enableMouseTracking: false,
	showInLegend: false,
	rules: [{
		key: 'fill',
		operator: 'is',
		value: 'none'
	}]
}];

function showSeriesSetup(setup) {
	$.each(setup, function (i, series) {
		var $div = $('<div>').appendTo($('#series-setup'));
		$('<input>')
			.attr({
				name: i + '-name',
				value: series.name
			})
			.appendTo($div);
	})
}	
*/


$(function() {
	$.getJSON('/torrang/public/chart/list.json.php', function (localFiles) {

		var $preset = $('#preset')
			.change(function () {
				runPreset($preset[0].selectedIndex);
			});

		function runPreset(index) {
			var preset = presets[index];

			$preset[0].selectedIndex = index;

			if (preset && preset.url) {
				$('#load')[0].value = preset.url;
				location.hash = '#' + preset.url;
				runChart();
			} else if (!preset) { // local files
				
				$('#load')[0].value = 'http://' + location.host + '/maps/' + $preset.children()[index].value;
				runChart('Local file');
			}
		}

		function runChart() {
			drawMap('Highcharts map from SVG', $('#load')[0].value);
		}
		
		// Build the links
		for (var i = 0; i < presets.length; i++) {
			$('<option>' + presets[i].name + '</option>')
				.appendTo($preset);
		}
		// Build the links
		for (var i = 0; i < localFiles.length; i++) {
			if (i === 0) {
				$('<option>----- Local files ----</option>')
					.appendTo($preset);
			}
			$('<option>' + localFiles[i] + '</option>')
				.appendTo($preset);
		}
		
		if (location.hash) {
			for (var i = 0; i < presets.length; i++) {
				if (location.hash === '#' + presets[i].url) {
					runPreset(i);
				}
			}
			if (i === presets.length) {
				$('#load')[0].value = location.hash.replace(/^#/, '');
				runChart('Online file');
			}
		}
		//$(location.hash ? location.hash + '_' : '#_World2_').click();
		
		$('#load-submit').click(runChart);
	});
});
window["render_perf2014"] = function() {
    $('#perf2014_container').highcharts({
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Heroic Year-long Effort mostly by Dmitry, Xinchen and Nikita'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
			type: 'datetime',
			dateTimeLabelFormats: { // don't display the dummy year
				month: '%e. %b',
				year: '%b'
			},
			labels: { 
				style: { color: '#111', fontSize: '15px' },
			},
			title: { 
				text: '2014',
				style: { fontSize: '25px'}
			}
        }],
        yAxis: [{
            min: 0,
			showEmpty: false,
            title: {
                text: 'time',
				style: { fontSize: '25px' }
            },
			labels: {
				style: { color: '#111', fontSize: '15px' },
				format: '{value}s',
			}
        }, {
			min: 0,
			showEmpty: false,
			title: {
				text: 'instr',
				style: { fontSize: '25px' }
			},
            labels: {
				style: { color: '#111', fontSize: '15px' },
				format: '{value}B',
            },
			opposite: true
		}],
        tooltip: {
			enabled: false
        },
		legend: {
			title: { text: 'Wordpress 3.6' }
		},
        plotOptions: {
            column: {
                pointPadding: 0.01,
				groupPadding: 0.05,
                borderWidth: 0
            }
        },
        series: [{
            name: 'time',
			yAxis: 0,
            data: [[Date.UTC(2014,1,20), 26.756], 
				   [Date.UTC(2014,3, 4), 23.676],
				   [Date.UTC(2014,3,11), 22.529],
				   [Date.UTC(2014,3,18), 21.503],
				   [Date.UTC(2014,3,25), 20.857],
				   [Date.UTC(2014,5, 5), 18.957],
				   [Date.UTC(2014,5,18), 18.913],
				   [Date.UTC(2014,5,26), 18.245],
				   [Date.UTC(2014,6, 3), 17.403],
				   [Date.UTC(2014,6, 9), 16.540],
				   [Date.UTC(2014,6,30), 15.490],
				   [Date.UTC(2014,7, 9), 15.850],
				   [Date.UTC(2014,7,14), 14.810],
				   [Date.UTC(2014,8,15), 14.864],
				   [Date.UTC(2014,9, 2), 14.150],
				   [Date.UTC(2014,10,7), 13.890],
				   [Date.UTC(2014,11,11),13.430],
				   [Date.UTC(2014,12,31),12.629]],
			visible: true ,
			dataLabels: {
                enabled: true,
                rotation: -65,
                align: 'right',
                x: 22,
                y: -38,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
				format: '{point.y:.2f}'				
			}
        }, {
            name: 'instr',
			yAxis: 1,
            data: [[Date.UTC(2014,1,20),  9.413], 
				   [Date.UTC(2014,3, 4),  7.472],
				   [Date.UTC(2014,3,11),  7.186],
				   [Date.UTC(2014,3,18),  6.649],
				   [Date.UTC(2014,3,25),  6.171],
				   [Date.UTC(2014,5, 5),  5.090],
				   [Date.UTC(2014,5,18),  5.131],
				   [Date.UTC(2014,5,26),  4.992],
				   [Date.UTC(2014,6, 3),  4.747],
				   [Date.UTC(2014,6, 9),  4.307],
				   [Date.UTC(2014,6,30),  4.054],
				   [Date.UTC(2014,7, 9),  3.994],
				   [Date.UTC(2014,7,14),  3.627],
				   [Date.UTC(2014,8,15),  3.641],
				   [Date.UTC(2014,9, 2),  3.407],
				   [Date.UTC(2014,10,7),  3.235],
				   [Date.UTC(2014,11,11), 3.139],
				   [Date.UTC(2014,12,31), 2.900]],
			visible: true,
			dataLabels: {
                enabled: true,
                rotation: -65,
                align: 'right',
                x: 1,
                y: 9,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
				format: '{point.y:,.3f}'
			}
		}],
		credits: false
    });
}

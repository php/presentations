window["render_perf2014"] = function() {
    $('#perf2014_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Heroic Year-long Effort mostly by Dmitry, Xinchen and Nikita'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: [ 'Jan.20', 'Mar.4', 'Mar.11', 'Mar.18', 'Mar.25', 'May 5', 'May 18', 'May 26', 'Jun.3','Jun.9','Jun.30','Jul.9','Jul.14','Aug.15','Sep.2','Oct.7','Nov.11','Dec.31'],
			labels: { rotation: -45 },
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
            data: [26.756, 23.676, 22.592, 21.503, 20.857, 18.957, 18.913, 18.245, 17.403, 16.54, 15.49, 15.85, 14.81, 14.864, 14.15, 13.89, 13.43, 12.629],
			visible: true ,
			dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                x: 5,
                y: 7,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
				format: '{point.y:.2f}'				
			}
        }, {
            name: 'instr',
			yAxis: 1,
            data: [9.413, 7.472, 7.186, 6.649, 6.171, 5.090, 5.131, 4.992, 4.747, 4.307, 4.054, 3.994, 3.627, 3.641, 3.407, 3.235, 3.139, 2.900],
			visible: true,
			dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#fff',
                align: 'right',
                x: 5,
                y: 7,
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

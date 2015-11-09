window["render_drupalbench"] = function() {
    $('#drupalbench_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Drupal 8-git',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'node w/ 5 comments',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.5', 'PHP 5.6', 'PHP 7', 'HHVM 3.10.1' ],
            labels: {
                style: { color: '#000', fontSize: '20px' }
            }
        }],
        yAxis: [{
            min: 0,
			showEmpty: false,
            title: {
                text: 'Req/sec',
				style: { fontSize: '25px' }
            },
			labels: {
				style: { color: '#111', fontSize: '15px' }
			}
        }, {
			min: 0,
			showEmpty: false,
			title: {
				text: 'Latency (ms)',
				style: { fontSize: '25px' }
			},
            labels: {
				format: '{value}ms',
				style: { color: '#111', fontSize: '15px' }
            },
			opposite: true
		}],
        tooltip: {
			enabled: false
        },
		legend: {
			title: { text: 'Concurrent clients' }
		},
        plotOptions: {
            column: {
                pointPadding: 0.01,
                groupPadding: 0.05,
                borderWidth: 0
            }
        },
        series: [{
            name: 'r/s @ 10',
			yAxis: 0,
            data: [1323.05,1342.23,1915.98,1833.36],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                x: 4,
                y: 5,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
                format: '{point.y:.0f}'
			},
			visible: false
        }, {
            name: 'r/s @ 20',
			yAxis: 0,
            data: [1359.97,1378.89,1974.15,1981.65],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#fff',
                align: 'right',
                x: 4,
                y: 5,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
                format: '{point.y:.0f}'
			},
			visible: true

        }, {
            name: 'r/s @ 40',
			yAxis: 0,
            data: [1361.21,1360.52,1970.95,1973.36],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                x: 4,
                y: 5,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
                format: '{point.y:.0f}'
			},
			visible: false
        }, {
            name: 'latency @ 10',
			yAxis: 1,
			data: [7.5,7.6,5.2,5.6],
			tooltip: { valueSuffix: 'ms' },
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                x: 4,
                y: 5,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
                format: '{point.y:.1f}'
			},
			visible: false
		}, {
            name: 'latency @ 20',
			yAxis: 1,
			data: [14.7,14.6,10.1,10.2],
			tooltip: { valueSuffix: 'ms' },
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                x: 4,
                y: 5,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
                format: '{point.y:.1f}'
			},
			visible: false
		}, {
            name: 'latency @ 40',
			yAxis: 1,
			data: [29.4,29.8,20.2,20.4],
			tooltip: { valueSuffix: 'ms' },
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                x: 4,
                y: 5,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                },
                format: '{point.y:.1f}'
			},
			visible: false
		}],
		credits: false
    });
}

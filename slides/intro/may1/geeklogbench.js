window["render_geeklogbench"] = function() {
    $('#geeklogbench_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Geeklog 2.1.0',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'default frontpage',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.3', 'PHP 5.4', 'PHP 5.5', 'PHP 5.6', 'PHP 7', 'HHVM 3.7' ],
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
            data: [290.73,309.54,312.37,318.68,497.10,468.35],
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
            data: [294.86,314.61,314.64,321.81,509.81,476.68],
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
            data: [294.20,313.34,314.44,320.41,509.47,476.02],
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
            data: [34.5,32.3,32,31.4,20.2,21.4],
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
                format: '{point.y:.0f}'
			},
			visible: false
		}, {
            name: 'latency @ 20',
			yAxis: 1,
            data: [68,63.7,63.5,62.1,39.2,41.9],
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
                format: '{point.y:.0f}'
			},
			visible: false
		}, {
            name: 'latency @ 40',
			yAxis: 1,
            data: [136.1,127.4,127.6,124.6,78.6,84.2],
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
                format: '{point.y:.0f}'
			},
			visible: false
		}],
		credits: false
    });
}

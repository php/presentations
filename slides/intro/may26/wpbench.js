window["render_wpbench"] = function() {
    $('#wpbench_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Wordpress-4.1.1',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'http://wordpress/?p=1',
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
            data: [208.11,251.20,252.84,269.08,611.54,644.36],
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
            data: [210.57,254.37,255.80,272.55,627.32,666.2],
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
            data: [210.21,254.50,256.64,271.55,623.82,666.11],
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
			data: [48,39.9,39.8,37.2,16.3,18],
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
			data: [95,78.6,78.2,73.5,32.1,30],
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
			data: [192,156.7,155.7,148.7,64.3,60],
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

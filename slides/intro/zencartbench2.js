window["render_zencartbench"] = function() {
    $('#zencartbench_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'ZenCart 1.5.4',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'front page with demo data',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.3', 'PHP 5.4', 'PHP 5.5', 'PHP 5.6', 'PHP 7' ],
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
            data: [105.44,106.94,105.54,105.97,143.50],
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
            data: [105.64,107.04,105.84,106.30,142.76],
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
            data: [104.70,106.37,104.94,106.17,142.19],
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
            data: [95.0,93.4,94.7,94.6,69.9],
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
            data: [189.3,186.6,189.0,188.1,140.0],
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
            data: [381.5,376.5,380.8,375.2,280.3],
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

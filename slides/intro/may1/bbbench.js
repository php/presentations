window["render_bbbench"] = function() {
    $('#bbbench_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'phpBB 3.1.3',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'http://phpbb/viewforum.php?f=2',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.3', 'PHP 5.4', 'PHP 5.5', 'PHP 5.6', 'PHP 7', 'HHVM 3.7' ],
            labels: {
                style: { color: '#000', fontSize: '15px' }
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
            data: [306.64,374.98,368.68,394.90,699.50,579.75],
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
            data: [309.04,382.19,372.75,402.33,726.78,606.60],
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
            data: [308.27,381.72,376.45,404.10,721.15,605.47],
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
			data: [32.9,26.8,27.6,25.5,14.3,22.1],
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
			data: [65.2,52.3,54.8,49.7,27.5,33],
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
			data: [129.8,105.8,108.2,99.2,55.6,67.1],
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

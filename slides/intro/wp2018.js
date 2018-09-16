window["render_wpbench"] = function() {
    $('#wpbench_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Wordpress 4.9.8',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'http://wordpress/?p=1',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.3 (2009)', 'PHP 5.4 (2012)', 'PHP 5.5 (2013)', 'PHP 5.6 (2014)', 'PHP 7.0 (2015)', 'PHP 7.1 (2016)', 'PHP 7.2 (2017)', 'PHP 7.3 (2018)' ],
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
            data: [153.90,169.68,173.82,184.57,419.23,428.15,455.23,503.68],
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
            data: [154.37,172.02,175.07,187.01,432.57,434.57,465.28,520.20],
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
            name: 'latency @ 10',
			yAxis: 1,
			data: [70,47.25,46.25,43.48,19.71,18.88,17.59,15.90],
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
			data: [130,116.33,115.15,110.34,47.08,46.04,43.57,38.45],
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

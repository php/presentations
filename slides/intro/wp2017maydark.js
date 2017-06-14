window["render_wpbench"] = function() {
    $('#wpbench_container').highcharts({
        chart: {
            type: 'column',
            backgroundColor: '#000'
        },
        title: {
            text: 'Wordpress 4.8-alpha',
			style: { color: '#fff',fontSize: '40px' }
        },
        subtitle: {
            text: 'http://wordpress/?p=1',
			style: { color: '#fff', fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.3 (2009)', 'PHP 5.4 (2012)', 'PHP 5.5 (2013)', 'PHP 5.6 (2014)', 'PHP 7.0 (2015)', 'PHP 7.1 (2016)', 'PHP 7.2', 'PHP 7.2 Hybrid', 'PHP 7.2 Hybrid FDO' ],
            labels: {
                style: { color: '#fff', fontSize: '20px' }
            }
        }],
        yAxis: [{
            min: 0,
			showEmpty: false,
            title: {
                text: 'Req/sec',
				style: { color: '#fff', fontSize: '25px' }
            },
			labels: {
				style: { color: '#eee', fontSize: '15px' }
			}
        }, {
			min: 0,
			showEmpty: false,
			title: {
				text: 'Latency (ms)',
				style: { color: '#eee', fontSize: '25px' }
			},
            labels: {
				format: '{value}ms',
				style: { color: '#eee', fontSize: '15px' }
            },
			opposite: true
		}],
        tooltip: {
			enabled: false
        },
		legend: {
			title: { text: 'Concurrent clients', style: { color: '#fff' } }
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
            data: [153.90,189.96,195.26,210.87,472.82,479.12,497.90,499.60,532.59],
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
			visible: false
        }, {
            name: 'r/s @ 20',
            color: '#ddd',
			yAxis: 0,
            data: [154.37,192.39,196.13,211.87,475.55,485.52,501.04,503.50,539.57],
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
			visible: true

        }, {
            name: 'r/s @ 40',
			yAxis: 0,
            data: [154.12,191.43,196.23,210.31,479.41,483.16,501.17,504.37,540.13],
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
			visible: false
        }, {
            name: 'latency @ 10',
			yAxis: 1,
			data: [70,50,50,50,20,20,20,20,20],
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
			data: [130,100,100,100,40,40,40,40,40],
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
			data: [260,210,200,190,90,80,80,80,80],
			tooltip: { valueSuffix: 'ms' },
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
			visible: false
		}],
		credits: false
    });
}

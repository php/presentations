window["render_storage"] = function() {
    $('#storage_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'KV storage access times',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: '',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP Array', 'YAC', 'Local Memcache', 'Remote Memcache', 'Local Redis', 'Remote Redis', 'Local MySQL', 'Remote MySQL' ],
            labels: {
                style: { color: '#000', fontSize: '20px' }
            }
        }],
        yAxis: [{
            min: 0,
			showEmpty: false,
            title: {
                text: 'Access time (ms)',
				style: { fontSize: '25px' }
            },
			labels: {
				style: { color: '#111', fontSize: '15px' }
			}
        }, {
			min: 0,
			showEmpty: false,
			title: {
				text: 'Initial (ms)',
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
			title: { text: '' }
		},
        plotOptions: {
            column: {
                pointPadding: 0.01,
                groupPadding: 0.05,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Average',
			yAxis: 0,
            data: [0.00032,0.00138,0.01951,0.0937,0.02419,0.09409,0.05194,0.10982],
            dataLabels: {
                enabled: false,
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
            name: 'Lookup miss',
			yAxis: 0,
			data: [0.00292,0.00084,0.01886,0.06339,0.02239,0.07177,0.04641,0.09088],
			tooltip: { valueSuffix: 'ms' },
            dataLabels: {
                enabled: false,
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
            name: 'Initial',
			yAxis: 0,
			data: [0.01237,0.00212,0.19347,0.36944,0.18185,0.29536,0.3215,0.55842],
			tooltip: { valueSuffix: 'ms' },
            dataLabels: {
                enabled: false,
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

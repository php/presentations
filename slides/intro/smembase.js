window["render_smembase"] = function() {
    $('#smembase_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Memory Use',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'Base (no load, 10 processes)',
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
                text: 'M',
				style: { fontSize: '25px' }
            },
			labels: {
				style: { color: '#111', fontSize: '15px' }
			}
        }],
        tooltip: {
			enabled: false
        },
		legend: {
			title: { text: 'Type' }
		},
        plotOptions: {
            column: {
                pointPadding: 0.01,
                groupPadding: 0.05,
                borderWidth: 0
            }
        },
        series: [{
            name: 'USS - Unique Set Size',
			yAxis: 0,
            data: [1.2,1.4,1.4,1.4,1.5],
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
            name: 'PSS - Proportional Set Size',
			yAxis: 0,
            data: [6.8,7.9,8.2,8.3,6.1],
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
                format: '{point.y:.1f}'
			},
			visible: true

        }, {
            name: 'RSS - Resident Set Size',
			yAxis: 0,
            data: [86,99.8,101.7,102.4,75.9],
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

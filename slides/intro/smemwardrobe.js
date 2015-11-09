window["render_smemwardrobe"] = function() {
    $('#smemwardrobe_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'WardrobeCMS 1.2.0 Memory',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'front page with one short post',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.4', 'PHP 5.5', 'PHP 5.6', 'PHP 7' ],
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
            data: [48,50.9,48.2,16.7],
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
            data: [67.9,70.7,67.5,21.9],
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
            data: [277.3,277.7,271.3,104.5],
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

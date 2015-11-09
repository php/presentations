window["render_smemmoodle"] = function() {
    $('#smemmoodle_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Moodle-2.9-dev Memory',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'http://moodle/',
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
            data: [113,133.4,114.6,11.7],
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
            data: [146.3,167.1,146.9,18.7],
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
            data: [467.3,494.2,459.2,113.3],
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

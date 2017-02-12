window["render_smemwp"] = function() {
    $('#smemwp_container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Wordpress 4.3 Memory',
			style: { fontSize: '40px' }
        },
        subtitle: {
            text: 'http://wordpress/2017/02/05/hello-world/',
			style: { fontSize: '20px' }
        },
        xAxis: [{
            categories: [ 'PHP 5.3', 'PHP 5.4', 'PHP 5.5', 'PHP 5.6', 'PHP 7.0', 'PHP 7.1', 'PHP 7.2', 'PHP 7.2 FDO' ],
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
            data: [110.4,87.3,75.1,70.6,10.3,10.5,10.2,10.1],
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
            data: [139.7,111.7,99.6,93.9,15.3,15.4,15.2,15.1],
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
            data: [427.1,356.6,341.9,325,92.3,92.6,92.2,92],
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

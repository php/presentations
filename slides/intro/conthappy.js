window["render_conthappy"] = function() {
    $('#conthappy_container').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        }],
        yAxis: [{ // Primary yAxis
			min: 0,
			max: 50,
            labels: {
                format: '{value}☺',
                style: {
					fontSize: '15px'
                }
            },
            title: {
                text: 'Total Contributions',
                style: {
					fontSize: '25px'
                }
            }
        }, { // Secondary yAxis
			min: 0,
			max: 20,
            title: {
                text: 'Oxytocin Level',
                style: {
					fontSize: '25px'
                }
            },
            labels: {
                format: '{value} pg/ml',
                style: {
					fontSize: '15px'
                }
            },
            opposite: true
        }],
        tooltip: {
            enabled: false
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 50,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
			itemStyle: { fontSize: '30px' }
        },
        series: [{
            name: 'Contributions',
            type: 'column',
            yAxis: 0,
            data: [1, 2, 3, 4, 5, 6, 8, 10, 13, 16, 20, 25],
        }, {
            name: 'Oxytocin Level',
            type: 'spline',
            yAxis: 1,
			lineWidth: '5px',
            data: [0.2, 0.7, 1.3, 2.1, 3.4, 4.8, 6.0, 7.8, 9.8, 11.4, 14.5, 30],
        }],
		credits: false
    });
}

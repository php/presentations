<?php
require 'ezc-setup.php';

$chart = new ezcGraphPieChart();
$chart->title = 'Browser Partitioning';

$chart->data['browser'] = new ezcGraphArrayDataSet( array(
	'IE5' => 698,
	'IE6' => 17383,
	'IE7' => 708,
	'Firefox' => 10001,
	'Netscape' => 871,
	'Opera' => 584,
) );
$chart->data['browser']->highlight['Firefox'] = true;

$chart->driver = new ezcGraphSvgDriver();

$chart->renderer = new ezcGraphRenderer3d();
$chart->renderer->options->pieChartShadowSize = 10;
$chart->renderer->options->pieChartGleam = .5;
$chart->renderer->options->dataBorder = false;
$chart->renderer->options->pieChartHeight = 16;
$chart->renderer->options->legendSymbolGleam = .5;

$chart->renderer->options->pieChartOffset = 180;

header( 'Content-Type: image/svg+xml' );
$chart->render( 560, 200, 'php://output' );
?>

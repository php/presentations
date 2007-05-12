<?php
require 'ezc-setup.php';
header( 'Content-Type: image/svg+xml' );
list( $domains, $ips ) = require 'data-graph1.php';

$chart = new ezcGraphLineChart();

$chart->title = 'PHP Usage Statistics';
$chart->palette = new ezcGraphPaletteTango();
$chart->options->fillLines = 230;

$chart->legend->title = "Legend";

$chart->xAxis->font->maxFontSize = 12;
$chart->yAxis->font->maxFontSize = 12;
$chart->title->font->maxFontSize = 20;

$chart->data['domains'] = new ezcGraphArrayDataSet( $domains );
$chart->data['domains']->label = 'Domains';
$chart->data['ips'] = new ezcGraphArrayDataSet( $ips );
$chart->data['ips']->label = 'IP addresses';

$chart->driver = new ezcGraphSvgDriver();
$chart->render( 600, 400, 'php://output' );

?>

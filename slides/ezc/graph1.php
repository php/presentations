<?php
require 'ezc-setup.php';
list( $domains, $ips ) = require 'data-graph1.php';

$chart = ezcGraph::create( 'Line' );

$chart->title = 'PHP Usage Statistics';
$chart->palette = 'Tango';
$chart->options->padding = 10;
$chart->options->fillLines = 230;

$chart->legend->symbolSize = 7;
$chart->legend->title = "Legend";
$chart->legend->padding = 3;

$chart->options->font = dirname(__FILE__) . '/font.ttf';
$chart->xAxis->font->maxFontSize = 10;
$chart->yAxis->grid = '#aaaaaa';
$chart->yAxis->axisSpace = 0.2;
$chart->title->font->maxFontSize = 20;

$chart['domains'] = $domains;
$chart['domains']->label = 'Domains';
$chart['ips'] = $ips;
$chart['ips']->label = 'IP addresses';

$chart->driver = new ezcGraphGdDriver();
$chart->render( 700, 400, '/tmp/graph1.png' );

?>

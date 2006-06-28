<?php
require 'ezc-setup.php';

$chart = ezcGraph::create( 'Pie' );
$chart->title = 'Browser Partitioning';
$chart->palette = 'Tango';

$chart['browser'] = array(
	'Firefox' => 10001,
	'IE5' => 698,
	'IE6' => 17383,
	'IE7' => 708,
	'Netscape' => 871,
	'Opera' => 584,
);
$chart['browser']->highlight['Firefox'] = true;

$chart->title->font = dirname(__FILE__) . '/font.ttf';
$chart->title->font->maxFontSize = 20;
$chart->driver = new ezcGraphGdDriver();
$chart->options->font = dirname(__FILE__) . '/font.ttf';
$chart->options->maxLabelHeight = 0.08;
$chart->render( 700, 400, '/tmp/graph2.png' );
?>

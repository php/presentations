<?php
require 'ezc-setup.php';

$max = 23;
$output = new ezcConsoleOutput;
$output->formats->bar->color = 'red';
$output->formats->bar->style = array( 'bold' );
$options = array( 
	'emptyChar'       => ' ',
	'barChar'         => '-',
	'formatString'    =>
		'%act% / %max% [' .
		$output->formatText( '%bar%', 'bar' ). 
		'] %fraction%%',
);
$progress = new ezcConsoleProgressbar( $output, $max, $options );

for ( $i = 0; $i < $max; $i++ )
{
	usleep( 20000 );
	$progress->advance();
}

$progress->finish();
?>

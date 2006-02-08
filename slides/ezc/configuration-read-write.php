<?php
require 'ezc-setup.php';

$reader = new ezcConfigurationIniReader();
$reader->init( dirname( __FILE__ ). '/cfg', 'example2' );
// Validation
$result = $reader->validate();
foreach ( $result->getResultList() as $resultItem )
{
	echo htmlspecialchars( basename( $resultItem->file ) . ":" .
		$resultItem->line . ":" . $resultItem->column . ":" .  " " .
		$resultItem->details . "\n" );
}

// Reading
$reader->init( dirname( __FILE__ ). '/cfg', 'example' );
$cfg = $reader->load();

// Writing
$writer = new ezcConfigurationArrayWriter();
$writer->init( dirname( __FILE__ ). '/cfg', 'example', $cfg );
$writer->save();
?>

<?php
require 'ezc-setup.php';

$archive = ezcArchive::open( dirname( __FILE__ ) . '/test-archive.zip' );
foreach( $archive as $entry )
{
	if ( $entry->getPath() == 'archive-logo.jpg' )
	{
		$dir = dirname( __FILE__ );
		echo "Extracting {$entry->getPath()} to $dir.<br/><br/>\n";
	    $archive->extractCurrent( $dir );
	}

    echo $entry, "\n";
}
?>

<?php
require 'ezc-setup.php';

try {
	$feed = ezcFeed::parse( 'http://components.ez.no/rss/rss2.xml' );
} catch ( Exception $e ) {
	$feed = ezcFeed::parse( dirname( __FILE__ ) . '/rss2.xml' );
}

echo "<b>{$feed->title}</b><br/><br/>\n";
foreach( $feed->item as $item )
{
	echo "<a href='{$item->link}'>{$item->title}</a><br/>";
	echo $item->Content->encoded, "<br/>";
}
?>

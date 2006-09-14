<pre style="font-size: 11px;">
<?php
require 'ezc-setup.php';

// setup feed and content module
$feed = new ezcFeed( 'rss2' );
$feed->title = 'eZ components release feed';
$feed->link  = 'http://components.ez.no/';
$feed->description = <<<ENDL
This feed shows all the latest components releases.
ENDL;
$feed->copyright = "eZ systems A.S.";
$feed->language = 'en-us';

// load data
$stmt = require 'feed-data.php';

foreach( $stmt as $release )
{
    $item = $feed->newItem();
    $item->title = "{$release['package']} {$release['version']}";
    $item->link = "http://ez.no/doc/components/view/latest/(file)/changelog_{$release['package']}.html";
    $item->description = $release['releasenotes'];
    $item->published = $release['releasedate'];
    $item->guid = md5( $item->title );
}

echo htmlspecialchars( $feed->generate() );
?>

<?php
require 'ezc-setup.php'; @mkdir( '/tmp/temp-location' );

ezcCacheManager::createCache(
	'identifier', '/tmp/temp-location',
	'ezcCacheStorageFileEvalArray', array( 'ttl' => 30 ) );
$cache = ezcCacheManager::getCache( 'identifier' );
$myId = 'unique_id_1';

if ( ( $data = $cache->restore( $myId ) ) === false )
{
    $data = "Plain cache stored on " . date( 'Y-m-d, H:i:s' );
    $cache->store( $myId, $data );
}
echo $data;

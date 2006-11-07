<?php
require 'ezc-setup.php';

$db1 = ezcDbFactory::create( 'mysql://root@localhost/test' );
ezcDbInstance::set( $db1, 'ezc' );

$trunk = ezcDbFactory::create( 'mysql://root@localhost/geolocation' );
ezcDbInstance::set( $trunk, 'ezt' );

$db = ezcDbInstance::get( 'ezt' );
echo $db->getName();
?>

<?php
require 'ezc-setup.php';

$db1 = ezcDbFactory::create( 'mysql://root@localhost/ezc' );
ezcDbInstance::set( $db1, 'ezc' );

$trunk = ezcDbFactory::create( 'mysql://root@localhost/eztrunk' );
ezcDbInstance::set( $trunk, 'ezt' );

$db = ezcDbInstance::get( 'ezt' );
echo $db->getName();
?>

<?php
require 'ezc-setup.php';
$session = new ezcPersistentSession(
    ezcDbInstance::get(),
    new ezcPersistentCodeManager( "path/to/definitions" )
);

// Creating New Objects
$object = new City();
$object->normalized_name = "dieren";
$object->name = 'Dieren';
$object->country = 'NL';
$session->save( $object );

// Finding Objects
$q = $session->createFindQuery( 'City' );
$q->where(
        $sq->expr->like( 'name', $sq->bindValue( 'oslo%' ) )
    )
  ->orderBy( 'country', 'name' )
  ->limit( 10 );
$objects = $session->findIterator( $q, 'City' );

foreach ( $objects as $object )
{
    // ...
}
?>

<?php
require 'ezc-setup.php';
$db = ezcDbFactory::create( 'mysql://root@localhost/geolocation' );
$sq = $db->createSelectQuery();

$stmt = $sq->select( 'name', 'country', 'lat', 'lon' )
    ->from( 'city' )
    ->where(
        $sq->expr->like(
            'normalized_name', $sq->bindValue( 'oslo%' )
        )
    )
    ->orderBy( 'country', 'name' )
    ->prepare();
$stmt->execute();

foreach ( $stmt as $entry )
{
    list( $name, $country, $lat, $lon ) = $entry;
    printf( '%s, %s is @ %.2f%s %.2f%s<br/>',
        $name, $country,
        abs( $lat ), ($lat > 0 ? "N" :"S" ),
        abs( $lon ), ( $lon > 0 ? "E" : "W" ) );
}
?>

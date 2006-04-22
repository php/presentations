<?php
require 'ezc-setup.php';

// Create the schema objects
$db = ezcDbFactory::create( 'mysql://root@localhost/geolocation' );
$dbSchema = ezcDbSchema::createFromDb( $db );
$wantedSchema = ezcDbSchema::createFromFile(
	'xml', dirname( __FILE__ ) . '/geoschema.xml'
);

// Compare the schemas
$differences = ezcDbSchemaComparator::compareSchemas(
	$dbSchema, $wantedSchema
);

// Show the differences
foreach( $differences->convertToDDL( $db ) as $query )
{
	echo $query, ";<br/>\n";
}
?>

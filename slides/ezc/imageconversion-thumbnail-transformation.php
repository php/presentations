<?php
require 'ezc-setup.php';

// Setup
$filters = array();
$settings = new ezcImageConverterSettings(
	array( new ezcImageHandlerSettings( 'GD', 'ezcImageGdHandler' ) )
);
$converter = new ezcImageConverter( $settings );

// Create transformation
$filters[] = new ezcImageFilter(
	'croppedThumbnail', array( 'width' => 128, 'height' => 128 )
);
$converter->createTransformation(
	'doThumbnail', $filters, array( 'image/png' )
);

foreach ( glob ( '*.[Jj][Pp][Gg]') as $file )
{
	$converter->transform(
		'doThumbnail', $file, "thumbnails/{$file}.png"
	);
}
?>

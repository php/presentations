<?php
require 'ezc-setup.php';
$dir = dirname( __FILE__ );
// Setup
$filters = array();
$settings = new ezcImageConverterSettings(
  array( new ezcImageHandlerSettings( 'GD', 'ezcImageGdHandler' ) )
);
$converter = new ezcImageConverter( $settings );

// Create transformations
$filters[] = new ezcImageFilter( 'scale',
  array( 
    'width' => 320, 'height' => 240,
    'direction' => ezcImageGeometryFilters::SCALE_DOWN,
  )
);
$converter->createTransformation(
  'preview', $filters, array( 'image/jpeg' )
);

$filters[] = new ezcImageFilter( 'colorspace', 
  array( 'space' => ezcImageColorspaceFilters::COLORSPACE_GREY )
);
$converter->createTransformation(
  'prevgrey', $filters, array( 'image/jpeg' )
);

// Apply transformations
$converter->transform( 
  'preview', "$dir/nacreous.jpg", "$dir/nacreous-small.jpg"
);
$converter->transform( 
  'prevgrey', "$dir/nacreous.jpg", "$dir/nacreous-grey.jpg"
);
?>

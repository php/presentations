<?php
require 'imageconversion.php';

// Apply transformations
$converter->transform( 
  'preview', "$dir/nacreous.jpg", "$dir/nacreous-small.jpg"
);
$converter->transform( 
  'prevgrey', "$dir/nacreous.jpg", "$dir/nacreous-grey.jpg"
);
?>

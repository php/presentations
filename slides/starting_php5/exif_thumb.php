<?php
header("Content-Type: image/jpeg");
echo exif_thumbnail(dirname(__FILE__) . '/PDR_1204.JPG'); 
?>
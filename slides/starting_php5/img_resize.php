<?php
header('Content-Type: image/png');

$src_im = imagecreatefromjpeg("PDR_1204.JPG");
$new_x = floor(imagesx($src_im) / 10);
$new_y = floor(imagesy($src_im) / 10);

$thumb = imagecreatetruecolor($new_x, $new_y);
imagecopyresized($thumb, $src_im, 0, 0, 0, 0, $new_x, $new_y, 
	imagesx($src_im), imagesy($src_im));
ImageDestroy($src_im);

imagefilter($thumb, IMG_FILTER_NEGATE);

ImagePNG($thumb);
?>

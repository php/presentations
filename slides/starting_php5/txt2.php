<?php
Header("Content-type: image/png");
$font = 'Times';
$si = (int)$_REQUEST['si'] ? (int)$_REQUEST['si'] : 66;
$im = ImageCreateFromPNG('php-blank.png');
$tsize = imagettfbbox($si,0,$font,$text);
$dx = abs($tsize[2]-$tsize[0]);
$dy = abs($tsize[5]-$tsize[3]);
$x = ( imagesx($im) - $dx ) / 2;
$y = ( imagesy($im) - $dy ) / 2 + 3*$dy/4;
$blue = ImageColorAllocate($im,0x5B,0x69,0xA6);
$white = ImageColorAllocate($im,255,255,255);
$black = ImageColorAllocate($im,0,0,0);
ImageAlphaBlending($im,true);
ImageTTFText($im, $si, 0, $x, $y, $white, $font, $_REQUEST['text']);
ImageTTFText($im, $si, 0, $x+2, $y, $white, $font, $_REQUEST['text']);
ImageTTFText($im, $si, 0, $x, $y+2, $white, $font, $_REQUEST['text']);
ImageTTFText($im, $si, 0, $x+2, $y+2, $white, $font, $_REQUEST['text']);
ImageTTFText($im, $si, 0, $x+1, $y+1, $black, $font, $_REQUEST['text']);
ImagePNG($im);
?>

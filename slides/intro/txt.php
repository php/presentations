<?php
Header("Content-type: image/png");
$im = ImageCreate(630,80);
$blue = ImageColorAllocate($im,0x5B,0x69,0xA6);
$white = ImageColorAllocate($im,255,255,255);
$black = ImageColorAllocate($im,0,0,0);
ImageTTFText($im, 45, 0, 10, 57,$black,"CANDY",$_GET['text']);
ImageTTFText($im, 45, 0, 6, 54,$white,"CANDY",$_GET['text']);
ImagePNG($im);
?>

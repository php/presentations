<?php
$im  = ImageCreate(600,3000);
$white = ImageColorAllocate($im,255,255,255);
$black = ImageColorAllocate($im,0,0,0);
$y=30;
foreach (glob("c:/Windows/Fonts/*.ttf") as $v) {
	ImageString($im,5,5,$y-20,substr($file,0,-4),$black);
	ImageTTFText($im,30,0,100,$y,$black, basename($v, '.ttf'),"ABCdéf123");
	$y+=40;
}
Header('Content-Type: image/png');
ImagePNG($im);
?>

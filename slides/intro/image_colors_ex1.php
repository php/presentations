<?
$im  = ImageCreate(300,256);
for($r=0; $r<256; $r++) {
	$col = ImageColorAllocate($im,$r,0,0);
	ImageLine($im, 0,$r, 100, $r, $col);
}
for($g=0; $g<256; $g++) {
	$col = ImageColorAllocate($im,0,$g,0);
	ImageLine($im, 100,255-$g, 200, 255-$g, $col);
}
for($b=0; $b<256; $b++) {
	$col = ImageColorAllocate($im,0,0,$b);
	ImageLine($im, 200,$b, 300, $b, $col);
}
Header('Content-Type: image/png');
ImagePNG($im);
?>

<?
$im  = ImageCreateTruecolor(720,180);
ImageAlphaBlending($im,$blend);
ImageFilledRectangle($im,0,0,719,179,0x00ffffff);
ImageTTFText($im,80,0,10,135,0x00000000,
  "/usr/share/fonts/truetype/HEATHER_.TTF","ABCdef123");
Header('Content-Type: image/png');
ImagePNG($im);
?>

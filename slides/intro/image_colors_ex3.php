<?
$im  = ImageCreateTruecolor(400,300);
ImageFilledRectangle($im,0,0,399,299,0x00ffffff);
ImageFilledEllipse($im,200,150,300,300,0x00000000);
ImageAlphaBlending($im,true);
ImageFilledRectangle($im,100,0,400,100,0x60ff1111);
ImageFilledRectangle($im,100,100,400,200,0x30ff1111);
ImageFilledRectangle($im,100,200,400,300,0x10ff1111);
Header('Content-Type: image/png');
ImagePNG($im);
?>

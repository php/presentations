<?
Header('Content-Type: image/png');
$height = 600;
$txt = 'CaRL the Engineer';
$size = ImageTTFBbox(25,0,'timesi',$txt);
$txt_w = abs($size[2]-$size[0]);
$txt_h = abs($size[6]-$size[1]);
$bg = ImageCreateFromJpeg('p0004557.jpg');
$img_width = imagesx($bg);
$img_height = imagesy($bg);
$width = ($height)/$img_height * $img_width;
$sizing =  "Original image size $img_width x $img_height\r\n";
$sizing .= "     New image size $width x $height";
$im = ImageCreateTrueColor($width,$height);
ImageAlphaBlending($im,false);
ImageCopyResampled($im,$bg,0,0,0,0,$width,$height,$img_width,$img_height);
$white = ImageColorAllocate($im,255,255,255);
ImageTTFText($im,15,0,20,20,$white,'couri',$sizing);
ImageDestroy($bg);
$col = ImageColorResolveAlpha($im,10,10,10,50);
ImageAlphaBlending($im,true);
$box = ($width-$txt_w)/2;
ImageFilledRectangle($im,$box-10,$height-$txt_h-30,$width-$box,$height-5,$col);
ImageAlphaBlending($im,false);
$yellow = ImageColorAllocate($im,255,255,10);
ImageTTFText($im,25,0,$box,$height-$txt_h-5,$yellow,'timesi',$txt);
ImagePNG($im);
?>

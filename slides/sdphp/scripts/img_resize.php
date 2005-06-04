<?php
    Header('Content-Type: image/png');
    $height = 600;
    $txt = 'My nephew Marcio, the future Linux kernel hacker';
    $font = '/usr/X11R6/lib/X11/fonts/TTF/luximri.ttf';
    if (!file_exists($font)) {
        $font = 'timesi';
    }
    $size = ImageTTFBbox(14,0,$font,$txt);
    $txt_w = abs($size[2]-$size[0]);
    $txt_h = abs($size[6]-$size[1]);
    $bg = ImageCreateFromJpeg('../images/jmc_nephew.jpg');
    $img_width = imagesx($bg);
    $img_height = imagesy($bg);
    $width = ($height)/$img_height * $img_width;
    $sizing =  "Original image size $img_width x $img_height\r\n";
    $sizing .= "     New image size $width x $height";
    $im = ImageCreateTrueColor($width,$height);
    ImageCopyResampled($im,$bg,0,0,0,0,$width,$height,$img_width,$img_height);
    $white = ImageColorAllocate($im,255,255,255);
    $black = ImageColorAllocate($im,0,0,0);
    $col = ImageColorResolveAlpha($im,10,10,10,50);
    ImageFilledRectangle($im,10,5,470,90,0x30ffffff);
    ImageTTFText($im,14,0,20,40,$black,$font,$sizing);
    ImageDestroy($bg);
    $box = ($width-$txt_w)/2;
    ImageFilledRectangle($im,$box-10,$height-$txt_h-30,$width-$box,$height-5,$col);
    $yellow = ImageColorAllocate($im,255,255,10);
    ImageTTFText($im,14,0,$box,$height-$txt_h-5,$yellow,$font,$txt);
    ImagePNG($im);
?>

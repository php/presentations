<?php
    $i = imagecreatefromjpeg('carl.jpg');
    switch((int)$_GET['filt']) {
       case -1: break;
       case IMG_FILTER_BRIGHTNESS:
            imagefilter($i, (int)$_GET['filt'], 60);
            break;
       case IMG_FILTER_SMOOTH:
            imagefilter($i, (int)$_GET['filt'], 100);
            break;
       case IMG_FILTER_CONTRAST:
            imagefilter($i, (int)$_GET['filt'], 20);
            break;
       case IMG_FILTER_COLORIZE:
            imagefilter($i, (int)$_GET['filt'], 0,0,128);
            break;
       case 11:
            imagefilter($i, IMG_FILTER_GRAYSCALE);
            imagefilter($i, IMG_FILTER_EMBOSS);
            break;
       default:
            imagefilter($i, (int)$_GET['filt']);
            break;
    }
    header('Content-type: image/jpeg');
    imagejpeg($i);
?> 

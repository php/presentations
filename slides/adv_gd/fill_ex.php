<?php

    define("WIDTH", 450);
    define("HEIGHT", 450);
    
    $img = imagecreate(WIDTH, HEIGHT);
    $background = $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $black = imagecolorallocate($img, 0, 0, 0);
    $red = imagecolorallocate($img, 0xFF, 0, 0);
    $blue = imagecolorallocate($img, 0, 0, 0xFF);
    
    $center_x = (int)WIDTH/2;
    $center_y = (int)HEIGHT/2;
    
    imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
    
    imageline($img, $center_x, 0, $center_x, HEIGHT-1, $black);
    imageline($img, 0, 0, WIDTH-1, HEIGHT-1, $red);
    imageline($img, WIDTH-1, 0, 0, HEIGHT-1, $blue);
    
    imagefill($img, 2, 20, $black);
    imagefilltoborder($img, WIDTH-2, 20, $red, $blue);

    header("Content-Type: image/png");    
    imagepng($img);
?>
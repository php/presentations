<?php
    define("WIDTH", 200);
    define("HEIGHT", 200);
    define("B_WIDTH", 20);
    define("B_HEIGHT",20);

    $img = imagecreate(WIDTH, HEIGHT);
    $background = $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $black = imagecolorallocate($img, 0, 0, 0);

    $brush = imagecreate(B_WIDTH, B_HEIGHT);
    $b_bkgr = $b_white = imagecolorallocate($brush, 0xFF, 0xFF, 0xFF);
    $b_black = imagecolorallocate($brush, 0, 0, 0);
    imagecolortransparent($brush, $b_bkgr);
    imageellipse($brush, B_WIDTH/2, B_HEIGHT/2, B_WIDTH/2, B_HEIGHT/2, $black);

    imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
    
    imagesetbrush($img, $brush);
    
    imageline($img, 0, HEIGHT-1, WIDTH-1, 0, IMG_COLOR_BRUSHED);
    imageellipse($img, WIDTH/2, HEIGHT/2, WIDTH/2, HEIGHT/2, IMG_COLOR_BRUSHED);

    header("Content-Type: image/png");
    imagepng($img);      
?>

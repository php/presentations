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
    
    $style_a = array_fill(0, B_WIDTH/2, 0);
    $style_a[] = 1;
    imagesetstyle($img, $style_a);
    imageline($img, 0, 50, WIDTH-1, 50, IMG_COLOR_STYLEDBRUSHED);
    
    $style_b = array_fill(0, B_WIDTH/4, 0);
    $style_b[] = 1;
    imagesetstyle($img, $style_b);
    imageline($img, 0, 100, WIDTH-1, 100, IMG_COLOR_STYLEDBRUSHED);
    
    $style_c = array_fill(0, B_WIDTH/8, 0);
    $style_c[] = 1;
    imagesetstyle($img, $style_c);
    imageline($img, 0, 150, WIDTH-1, 150, IMG_COLOR_STYLEDBRUSHED);

    header("Content-Type: image/png");
    imagepng($img);   
?>

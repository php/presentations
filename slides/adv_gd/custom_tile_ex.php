<?php
    define("WIDTH", 450);
    define("HEIGHT", 450);
    define("T_WIDTH", 20);
    define("T_HEIGHT",20);

    $img = imagecreate(WIDTH, HEIGHT);
    $background = $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $black = imagecolorallocate($img, 0, 0, 0);
    
    $tile = imagecreate(T_WIDTH, T_HEIGHT);
    $t_bkgr = $t_white = imagecolorallocate($tile, 0xFF, 0xFF, 0xFF);
    $t_black = imagecolorallocate($tile, 0,0,0);
    
    imagefilledrectangle($tile, 0, 0, T_WIDTH/2, T_HEIGHT/2, $t_black);
    imagefilledrectangle($tile, T_WIDTH/2, T_HEIGHT/2,
                                T_WIDTH-1, T_HEIGHT-1, $t_black);
    
    imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
    imagesettile($img, $tile);
    imagefilledrectangle($img, 1, 1, WIDTH-2, HEIGHT-2, IMG_COLOR_TILED);
    
    header("Content-Type: image/png");
    imagepng($img);   
?>
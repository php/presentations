<?php

    define("WIDTH", 450);
    define("HEIGHT", 100);

    define("F_SIZE", 40);
    define("F_ANGLE", 0);
    define("F_FONT", "verdana.ttf");
    
    $img = imagecreate(WIDTH, HEIGHT);

    $white = imagecolorallocate($img, 255,255,255);
    $black = imagecolorallocate($img, 0,0,0);

    $start_x = 10;
    $start_y = (int)HEIGHT/2;
    $text = "PHP Developer's Handbook";
    
    imagerectangle($img, 0,0,WIDTH-1,HEIGHT-1, $black);
    imageTTFtext($img, F_SIZE, F_ANGLE,
                 $start_x, $start_y, $black, F_FONT, $text);
    
    header("Content-Type: image/png");
    imagepng($img);
?>

<?php

    define("WIDTH", 450);
    define("HEIGHT", 450);
    
    $img = imagecreate(WIDTH, HEIGHT);
    $background = $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $blue = imagecolorallocate($img, 0, 0, 0xFF);
    $red  = imagecolorallocate($img, 0xFF, 0, 0);
    
    imagefilledrectangle($img, 10, 10, WIDTH-10, HEIGHT-10, $blue);
    imagefilledellipse($img, WIDTH/2, HEIGHT/2, WIDTH-30, HEIGHT-30, $red);
    
    header("Content-Type: image/png");    
    imagepng($img);
?>
<?php
        
    define("WIDTH", 400);
    define("HEIGHT", 400);
    
    $img = imagecreate(WIDTH, HEIGHT);
    
    $bg = $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $black = imagecolorallocate($img, 0, 0, 0);

    imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
    
    $center_x = (int)imagesx($img)/2;
    $center_y = (int)imagesy($img)/2;
    
    $angle = 0;
    $radius = 0;
    
    while($radius <= WIDTH ) {
        imagearc($img, $center_x, $center_y, $radius, $radius, $angle-5, $angle, $black);
        $angle += 5;
        $radius++;
    }

    header("Content-Type: image/png");
    imagepng($img);
    

    
?>
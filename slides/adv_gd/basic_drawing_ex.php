<?php

    define("WIDTH", 256);
    define("HEIGHT", 256);
    
    $img = imagecreate(WIDTH, HEIGHT);
    $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $black = imagecolorallocate($img, 0, 0, 0);
    $green = imagecolorallocate($img, 0, 0xFF, 0);
    $red  = imagecolorallocate($img, 0xFF, 0, 0);
    
    $points = array(0, 0,                // Vertex (0,0)
                    0, HEIGHT,           // Vertex (0, HEIGHT)
                    (int)WIDTH/2, 0,     // Vertex (WIDTH/2, 0)
                    WIDTH-1, HEIGHT-1,   // Vertex (WIDTH, HEIGHT)
                    WIDTH-1, 0);         // Vertex (WIDTH, 0)
    
    imagepolygon($img, $points, 5, $black);
    imagerectangle($img, 10, 10, WIDTH-10, HEIGHT-10, $green);
    imageellipse($img, WIDTH/2, HEIGHT/2, 30, 30, $red);
    imagefill($img, 11, 11, $red);
    
    header("Content-type: image/png");
    imagepng($img);
    
?>

<?php

    define("WIDTH", 200);
    define("HEIGHT", 200);

    $img = imagecreate(WIDTH, HEIGHT);
    
    $background = $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    $black = imagecolorallocate($img, 0, 0, 0);
    
    imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
    
    /* Define Style arrays */
    $dashed = array($black, $black, $black, $white, $white, $white);
    $sos = array($black, $black,
                    $white, $white, 
                    $black, $black,
                    $white, $white,	                /* . . . */
                    $black, $black,
                    $white, $white,

                    $black, $black, $black, $black,
                    $white, $white, 
                    $black, $black, $black, $black,	/* - - - */
                    $white, $white, 
                    $black, $black, $black, $black,
            
                    $white, $white,
                    $black, $black,
                    $white, $white,	                /* . . . */
                    $black, $black,
                    $white, $white,
                    $black, $black,

                    $white, $white,$white, $white,$white, $white);

    imagesetstyle($img, $sos);
    
    imageline($img, 0, 0, WIDTH-1, HEIGHT-1, IMG_COLOR_STYLED);
    imageline($img, 0, HEIGHT-1, WIDTH-1, 0, IMG_COLOR_STYLED);

    imagesetstyle($img, $dashed);
    imagerectangle($img, 30, 30, WIDTH-31, HEIGHT-31, IMG_COLOR_STYLED);
    imagerectangle($img, 50, 50, WIDTH-51, HEIGHT-51, $black);
    
    header("Content-Type: image/png");
    imagepng($img);

?>

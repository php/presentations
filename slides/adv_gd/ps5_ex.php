<?php
    define("WIDTH", 600);
    define("HEIGHT", 100);

    define("F_SIZE", 40);
    define("F_ANGLE", 0);
    define("F_FONT", "/usr/share/fonts/default/Type1/n019003l.pfb");
    
    $img = imagecreate(WIDTH, HEIGHT);

    $white = imagecolorallocate($img, 255,255,255);
    $black = imagecolorallocate($img, 0,0,0);

    $font = imagepsloadfont(F_FONT);
    
    $start_x = 10;
    $start_y = (int)HEIGHT/2;
    $text = "PHP Developer's Handbook";
    
    imagerectangle($img, 0,0,WIDTH-1,HEIGHT-1, $black);
    
    imagepsextendfont($font, 0.4);
    imagepsslantfont($font, 0.4);

    imagepstext($img, $text, $font, F_SIZE, $black, $white,
                $start_x, $start_y, 0, 0, F_ANGLE, 16);
    
    imagepsfreefont($font);
    
    header("Content-Type: image/png");
    imagepng($img);
?>

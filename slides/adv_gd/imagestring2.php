<?php
    define("WIDTH", 300);
    define("HEIGHT", 100);

    $img = imagecreate(WIDTH, HEIGHT);

    $white = imagecolorallocate($img, 255,255,255);
    $black = imagecolorallocate($img, 0,0,0);

    imagerectangle($img, 0, 0, WIDTH-1, HEIGHT-1, $black);
    
    $start_x = 10;
    $start_y = 10;
    
    for($font_num = 1; $font_num <= 5; $font_num++) {
        
        imagestring($img, $font_num,
                    $start_x, $start_y,
                    "Font #$font_num", $black);
                    
        $start_y += imagefontheight($font_num)+3;
    }
    
    imagepng($img);
?>
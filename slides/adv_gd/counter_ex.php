<?php
    define("C_DIGITS", "sbgs.gif");
    define("DIGIT_WIDTH", 12);
    define("DIGIT_HEIGHT", 13);    
    
    $number = 123412341234;
    settype($number, "string");    
    $t_digits = strlen($number);
    
    $width = ($t_digits * DIGIT_WIDTH) + 3;
    $height = DIGIT_HEIGHT + 3;

    $img = imagecreate($width, $height);
    $digits = imagecreatefromgif(C_DIGITS);

    $background = $black = imagecolorallocate($img, 0, 0, 0);
    
    $dest_x_offset = 1;
    for($i = 0; $i < $t_digits; $i++) {
    
         $cur_digit = (int)$number[$i];
         $digit_offset = (DIGIT_WIDTH * $cur_digit) - 1;
         imagecopy($img, $digits,
                   $dest_x_offset, 1,
                   $digit_offset,
                   0,
                   DIGIT_WIDTH + 1,
                   DIGIT_HEIGHT + 1);
         $dest_x_offset += DIGIT_WIDTH;
    }

    header("Content-Type: image/png");
    imagepng($img);
?>
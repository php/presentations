<?php
    define("SRC_FILE", "php.png");
    
    $img = imagecreatefrompng(SRC_FILE);
    $img_copy = imagecreatefrompng(SRC_FILE);
    
    imagecopymergegray($img_copy, $img, 10, 10, 0, 0,
                   imagesx($img), imagesy($img), 50);
    
    header("Content-Type: image/png");
    imagepng($img_copy);
?>
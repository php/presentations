<?php

    $img = imagecreatefrompng("php.png");
    
    $width = imagesx($img);
    $height = imagesy($img);

    $img_copy = imagecreate($width * 4, $height * 4);
    
    imagecopyresized($img_copy, $img, 0, 0, 0, 0, $width * 4, $height * 4, $width, $height);

    header("Content-type: image/png");    
    imagepng($img_copy);
?>
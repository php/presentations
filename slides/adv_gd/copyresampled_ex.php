<?php

    $img = imagecreatefrompng("php.png");
    
    $width = imagesx($img);
    $height = imagesy($img);

    $img_copy = imagecreate($width / 2, $height / 2);
    
    imagecopyresampled($img_copy, $img, 0, 0, 0, 0,
                       $width / 2, $height / 2, $width, $height);

    header("Content-type: image/png");    
    imagepng($img_copy);
?>
<?php

    define("WIDTH", 450);
    define("HEIGHT", 450);

    $img = imagecreate(WIDTH, HEIGHT);

    $background = $red = imagecolorallocate($img, 0xFF, 0, 0);
    imagecolorset($img, $background, 0, 0, 0xFF);
    header("Content-Type: image/png");
    imagepng($img);
?>
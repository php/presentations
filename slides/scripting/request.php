#!/usr/bin/php4
<?php

if ($argc < 2) {
    die ("You must specify a URL\n");
}


$port = 80;
if ($argc > 2) {
    $port = $argv[2];
}

$url = $argv[1];

if (!preg_match ("@^\S+\://@", $url)) {
    die ("You must specify a URL identifier\n");
}

/* Later versions of php can use file_get_contents ($url) */
print implode ("", file($url));
?>

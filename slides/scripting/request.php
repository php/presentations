<?php

if ($argc < 2) {
    die ("You must specify a URL\n");
}

$url = $argv[1];
if (!preg_match ("@^\S+\://@", $url)) {
    die ("You must specify a URL identifier\n");
}

print file_get_contents($url);
?>

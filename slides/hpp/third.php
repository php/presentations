<?php
require_once "Cache_File.inc";
$cache = new Cache_File("third.html", 10);
$cache->cachedir = "./";
// ...
?>

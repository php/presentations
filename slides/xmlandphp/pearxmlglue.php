<?php
require_once('pearxml.php');

$w = new Wishlist('thedata.xml');
$w->parse();
var_dump($w->items);
?>

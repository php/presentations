<?php
function __autoload($classname) {
	include_once("$classname.php");
}

$mono = new monkey;
$mono->scratch();
?>

<?php
class hello {
	function __call($name, $args) {
		echo "Hello $name!";
		echo "\n<br />\n";
	}
}

$h = new hello;
$h->sterling();
$h->rasmus();
?>

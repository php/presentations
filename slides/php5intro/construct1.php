<?php
class banana_v5 {
	function __construct() {
		echo "peel..peel..";
		echo "\n<br />\n";
	}

	function eat() {
		echo "chewy..chewy..";
		echo "\n<br />\n";
	}
}

$b = new banana_v5();
$b->eat();
?>

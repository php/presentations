<?php
class banana {
	function __construct() {
		echo "peel..peel..";
		echo "\n<br />\n";
	}

	function eat() {
		echo "chewy..chewy..";
		echo "\n<br />\n";
	}

	function __destruct() {
		echo "slip... crack!";
		echo "\n<br />\n";
	}
}

$b = new banana();
$b->eat();
?>

<?php
class foo_v5 {
	function bar() {
		return new bar_v5;
	}
}

class bar_v5 {
	function barbarina () {
		echo "booh!";
		echo "\n<br />\n";
	}
}

$f = new foo_v5;
$f->bar()->barbarina();
?>

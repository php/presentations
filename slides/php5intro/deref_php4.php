<?php
class foo_v4 {
	function bar() {
		return new bar_v4;
	}
}

class bar_v4 {
	function barbarina () {
		echo "booh!";
		echo "\n<br />\n";
	}
}

$f = new foo_v4;
$tmp = $f->bar();
$tmp->barbarina();
?>

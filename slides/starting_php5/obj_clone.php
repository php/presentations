<?php
class foo {
 	var $bar;
	function baz($val) {
		$this->bar = $val;
	}
}

$a = new foo();
$b = clone $a; // make $b contain a separate copy of $a
$a->baz(2);

var_dump($b->bar != $a->bar); // True
?>
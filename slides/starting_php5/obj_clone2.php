<?php
class foo {
 	var $bar, $is_clone = 0;
	function baz($val) {
		$this->bar = $val;
	}
	function __clone()
	{
		$this->is_clone = 1;
	}
}

$a = new foo();
$b = clone $a; // make $b contain a separate copy of $a

echo $b->is_clone; // will print 1
?>
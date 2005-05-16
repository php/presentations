<?php
class foo {
 	var $bar = 10;

	function baz($val) {
		global $foo2;
		$foo2 = $this;
		$this->bar *= $val;
	}
}

$a = new foo();
$foo3 = $a;
$a->baz(2);
var_dump($a->bar == $foo2->bar); // PHP4: False PHP5: True
var_dump($a->bar == $foo3->bar); // PHP4: False PHP5: True
?>
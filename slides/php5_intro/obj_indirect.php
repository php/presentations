<?php
class foo {
	public $bar = 3;
	function baz() {
		echo $this->bar;
	}
}

class bar {
	public $o;
	function __construct() {
		$this->o = new foo();
	}
}

$a = new bar();
$a->o->baz(); // will print 3
echo $a->o->bar; // will also print 3

/* in PHP 4 this would not be possible and require the following kludge */
$tmp =& $a->o;
$tmp->baz();
echo $tmp->bar;
?>
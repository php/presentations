<?php
class foo {
 	var $foo = 1, $bar = 10;

	function baz($val) {
		$this->bar *= $val;
	}
}

function mod_foo($foo)
{
	$foo->baz(10);
	$foo->foo = 123;
}

$a = new foo();
mod_foo($a);

echo $a->bar . "<br />"; // PHP4: 10 PHP5: 100
echo $a->foo . "<br />"; // PHP4: 1 PHP5: 123
?>
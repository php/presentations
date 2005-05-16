<?php
class foo {
	public $foo=1; // everyone can access
	private $bar=2; // can only be accessed by the class internally
	protected $baz=3; // can be accessed by the class internally & any extending classes

	function p1() { echo $this->foo . $this->bar . $this->baz; }
}

class foo_ex extends foo {
	function p2() { echo $this->foo . $this->bar . $this->baz; }
}

$a = new foo();
echo $a->p1(); // will print 123
$b = new foo_ex();
echo $b->p2(); // will print 13 + notice about unknown property foo_ex::$bar 
// accessing private/protected properties directly will result is a E_ERROR (fatal error)
echo $a->foo . $a->bar . $a->baz;
?>
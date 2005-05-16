<?php
class foo {
	public $vals = array('foo', 'bar', 'baz');

	function __toString()
	{
		return implode(' ', $this->vals);
	}
}

$a = new foo();
echo $a; // will print "foo bar baz"
?>
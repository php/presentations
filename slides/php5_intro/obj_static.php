<?php
class foo {
	static $bar = 123;
	
	static function baz() {
		return 456;
	}
}

echo foo::$bar; // will print 123
echo foo::baz(); // will print 456
?>
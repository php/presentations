<?php
function __autoload($classname) {
	$classes = array('foo' => 'obj_autoload2.php');

	include_once($classes[$classname]);
}

$a = new foo();
/* since the class foo is undeclared, PHP will execute the __autoload()
 * function and using the class name try to perform an operation that will
 * ideally result in the declaration of the class */
?>
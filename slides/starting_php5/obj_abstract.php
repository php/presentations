<?php
abstract class ab {
	abstract public function test();
}

/* the implementing class must implement all methods
 * specified in the abstract class */
class imp_ab extends ab {
	public function test() { 
		echo "implemented class was called";
	}
}

$a = new imp_ab();
$a->test();
?>
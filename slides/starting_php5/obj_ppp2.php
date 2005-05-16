<?php
class foo {
	public function p() {} // everyone can use
	private function p2() {} // only class foo may use internally
	protected function p3() {} // only class foo and it's extender can use
}

class foo_ex extends foo { 
	function foo_ex() { 
		$this->p2(); 
	} 
}

$a = new foo();
$a->p3(); // fatal error

$b = new foo_ex(); // will fail with fatal error
?>
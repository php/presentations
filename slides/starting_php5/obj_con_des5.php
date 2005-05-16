<?php
class foo {
	var $bar;

	function __construct($val) {
		$this->bar = $val;
	}

	function __destruct() {
		unset($this->bar);
	}
}
?>
<?php
class foo {
	private $int_data = array();

	function __get($var_name) {
		return $this->int_data[$var_name];
	}

	function __set($var_name, $value)
	{
		$this->int_data[$var_name] = urlencode($value);
	}
}

$a = new foo();
$a->bar = "random value";
echo $a->bar; // will print random+value
?>
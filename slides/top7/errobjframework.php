<?php
class simple {
	function getName($id) 
	{
		if ($id == 10) {
			return "Sterling";
		} else {
			$err = &new simple_error(-10, 
					"Invalid id given!");
			return $err;
		}
	}
}

class simple_error {
	var $str;
	var $number;

	function simple_error($number, $str) 
	{
		$this->str = $str;
		$this->number = $number;
	}
}

// start sample code
$s = &new simple;
$name = $s->getName(20);
if (is_object($name)) {
	die ("An error occured " . 
	     "[{$name->number}]: " . 
		 "{$name->str}\n");
}
else {
	print "Name for ID 20 was found\n";
}

<?php
function debug ($data)
{
	$fp = fopen('php://stderr', 'w');
    fwrite($fp, "$data\n");
	fclose($fp);
}

class OverloadMe 
{
    var $props = array ();
	var $methods = array(
						 'convn2br' => 'nl2br'
						);

	function __get ($propname, &$value) {
		debug ("Fetching $propname..");

		$value = $this->props[$propname];

		return true;
	}

	function __get_foo (&$value) {
		debug ("Fetching foo...");
		$value = 'BAR';
	}


	function __set ($propname, $value) {
		debug ("Setting $propname to $value...");

		$this->props[$propname] = $value;

		return true;
	}

	function __call ($methodname, $args, &$ret) {
		debug ("Calling $methodname...");

		$func = $this->methods[$methodname];
		if (isset($func))
			$ret = call_user_func_array ($func, $args);

		return true;
	}
}

overload ('OverloadMe');

$obj = &new OverloadMe;

// Property overloading
$obj->someprop = 'BAM BAM GO BAM';
print $obj->someprop;

// Print out property $foo which is a special case and 
// directly handled
print $obj->foo;

// Method overloading
print $obj->convn2br ("\n\nYABBADABBADOOOOO\n\n");
?>

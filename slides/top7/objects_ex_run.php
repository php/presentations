<?php
class simple {
	var $name;
}

function changeName ($o) {
	$o->name = "Sterling Hughes";
}

$o = new simple;
$o->name = "Johnny Red";
echo $o->name . "\n<br />\n";
changeName($o);
$o->name = "Johnny Red";
echo $o->name . "\n<br />\n";
?>

<?php
abstract class dali {
	abstract function paint();
}

class sterling extends dali {
	function paint() {
		echo "this is corny ";
		echo "impressionism humor.";
		echo "\n<br />\n";
	} 
}

$s = new sterling;
$s->paint();
?>

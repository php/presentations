<?php
class sheep {
	var $name;
}

$start = new sheep;
$start->name = "Dolly";
$new = $start->__clone();
$new->name = "Molly";
var_dump($start);
?>

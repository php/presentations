<?php
class Brand {
	var $name;
}

function change_name($drinkobj, $name)
{
	$drinkobj->name = $name;
}

$drink = new Brand;
$drink->name = 'Coke';
var_dump($drink->name);
change_name($drink, 'Pepsi');
echo "{$drink->name} the choice of a new generation\n";
?>

<?php

class Brand {
	final function show() {
		echo "The Pepsi Generation\n";
	}
}

final class BrandX extends Brand {
}

$t = new Brand();
$t->show();

class BetterBrand extends BrandX {
	function show() {
		echo "Coke is better\n";
	}
}

$t = new BetterBrand();
$t->show();
?>

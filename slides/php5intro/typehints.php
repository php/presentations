<?php
interface pump {
	function get_gas();
}

class premium implements pump {
	function get_gas() {
		echo "chug..chug..chug!\n<br />\n";
	}
}

class regular implements pump {
	function get_gas() {
		echo "chug..cough..chug..\n<br />\n";
	}
}

class mercedes {
	function infuse_gas(premium $pump) {
		echo "mercedes: ";
		$pump->get_gas();
	}
}

class pinto {
	function infuse_gas(pump $pump) {
		echo "pinto: ";
		$pump->get_gas();
	}
}

$pinto = new pinto;
$pinto->infuse_gas(new premium);
$pinto->infuse_gas(new regular);

$mercedes = new mercedes;
$mercedes->infuse_gas(new premium);
$mercedes->infuse_gas(new regular);
?>

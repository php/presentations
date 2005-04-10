<?php
	interface Printable {
		function getFormattedString();
	}

	class Vector3D implements Printable {
	    private $x, $y, $z;
	    function __construct($x, $y, $z) {
	       $this->x = $x;
	       $this->y = $y;
	       $this->z = $z;
	    }
		function getFormattedString() {
            return "[{$this->x}, {$this->y}, {$this->z}]";
		}
	}

	$v1 = new Vector3D(1.2, 4.2, sqrt(2));
	if($v1 instanceof Printable) {
		echo "v1 es: ".$v1->getFormattedString();
	}
?>
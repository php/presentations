<?php
class ParentClass {
    function beamazing () {
	print "I'm so amazing I must be aggregated!\n";
    }
}

class ChildClass {
    function simple () {
	print "I'm simple and unamazing :(((\n";
    }
}

$obj = new ChildClass;
var_dump ($obj);

aggregate($obj, 'ParentClass');

var_dump ($obj);

$obj->beamazing ();
?>

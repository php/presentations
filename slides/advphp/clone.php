<?php
class MyCloneable {
    static $id = 0;

    function MyCloneable() {
	$this->id = self::$id++;
    }

    function __clone() {
	$this->name = $clone->name;
	$this->address = 'New York';
	$this->id = self::$id++;
    }
}

$obj = new MyCloneable();

$obj->name    = 'Hello';
$obj->address = 'Tel-Aviv';

print $obj->id . "\n";

$obj = $obj->__clone();

print $obj->id . "\n";
print $obj->name . "\n";
print $obj->address . "\n";
?>

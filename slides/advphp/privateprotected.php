<?php
class MyClass {
    private $Hello = "Hello, World!\n";
    protected $Bar = "Hello, Foo!\n";
    protected $Foo = "Hello, Bar!\n";
    
    function printHello() {
	print "MyClass::printHello() ".$this->Hello;
	print "MyClass::printHello() ".$this->Bar;
	print "MyClass::printHello() ".$this->Foo;
    }
}

class MyClass2 extends MyClass {
    protected $Foo;
    
    function printHello() {
	MyClass::printHello(); 
	print "MyClass2::printHello() ".$this->Hello;
	print "MyClass2::printHello() ".$this->Bar;
	print "MyClass2::printHello() ".$this->Foo;
    }
}

$obj = new MyClass();
print $obj->Hello;  /* Shouldn't print out anything */
print $obj->Bar;    /* Shouldn't print out anything */
print $obj->Foo;    /* Shouldn't print out anything */
$obj->printHello(); /* Should print */

$obj = new MyClass2();
print $obj->Hello;  /* Shouldn't print out anything */
print $obj->Bar;    /* Shouldn't print out anything */
print $obj->Foo;    /* Shouldn't print out anything */
$obj->printHello();
?>

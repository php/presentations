<?php
class MyException {
    function __construct($exception) {
	$this->exception = $exception;
    }
    
    function Display() {
	print "MyException: $this->exception\n";
    }
}

class MyExceptionFoo extends MyException {
    function __construct($exception) {
	$this->exception = $exception;
    }
    
    function Display() {
	print "MyException: $this->exception\n";
    }
}

try {
    throw new MyExceptionFoo('Hello');
}
catch (MyException $exception) {
    $exception->Display();
}
?>

<?php
final class foo { function do_something() {} }

class bar extends foo {} // won't work, fatal error

class baz { final function foo() {} function bar() {} }

class foo2 extends baz { function bar() {} } // will work
class foo3 extends baz { function foo() {} } // will not work
?>
<?php
class old {
	function old() { $this->val = 123; }
}

class newer extends old {
	function __construct() {
		/* will work despite the older class using PHP 4 style constructor */
		parent::__construct();
	}
}

$a = new newer();
echo $a->val; // 123
?>
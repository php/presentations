<?php
class Brand {
	final public $type = 'Softdrink';
	public $name;
}

class Pepsi extends Brand {
	public $type = 'Laxative';
	function __construct() {
		$this->name = 'Pepsi';
	}
}

$p = new Pepsi();
echo "{$p->name} is {$p->type}\n";
?>

<?php
define('SERIALIZED', './presentations/slides/php5intro/serialized');

interface ISerializable {
	function sleep();
	function wakeup();
};

class Person implements ISerializable {
	public $name;

	function sleep() {
		file_set_contents(SERIALIZED, 
			serialize($this->name)
		);
	}

	function wakeup() {
		$this->name = unserialize(
		file_get_contents(SERIALIZED)
		);
	}
}

$p = new Person;
if ($p instanceof ISerializable) {
	$p->wakeup();
}
echo "Previous Spy: {$p->name}\n<br />\n";
$superspies = array('James Bond', 
				    'Sterling Hughes', 
					'Austin Powers');
$p->name = $superspies[array_rand($superspies)];
echo "New Spy: {$p->name}\n<br />\n";

if ($p instanceof ISerializable) {
	$p->sleep();
}
?>

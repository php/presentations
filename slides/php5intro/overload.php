<?php
class DBM {
	private $members;
	private $file;

	function __construct($file) {
		$this->members = unserialize(
			file_get_contents($file)
		);

		$this->file = $file;
	}

	function __get($name) {
		return $this->members[$name];
	}

	function __set($name, $value) {
		$this->members[$name] = $value;
	}

	function __destruct() {
		file_set_contents($this->file, 
			serialize($this->members)
		);
	}
}

$dbm = new DBM(
	'./presentations/slides/php5intro/db'
);

echo "Hello {$dbm->name}!\n";
$dbm->name = 'Sterling';
?>

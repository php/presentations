<?php
class DBM {
	private $members;
	private $file;

	function __construct($file) {
		$this->file = $file;
		$this->members = @unserialize(
			file_get_contents($file)
		);
	}

	function __get($name) {
		return $this->members[$name];
	}

	function __set($name, $value) {
		$this->members[$name] = $value;
	}

	function __destruct() {
		$f = fopen($this->file,'w');
		fwrite($f,serialize($this->members));
		fclose($f);
	}
}

$dbm = new DBM(
	'./presentations/slides/php5intro/db'
);

echo "Hello {$dbm->name}!\n";
$dbm->name = 'Sterling';
?>

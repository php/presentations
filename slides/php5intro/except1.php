<?php
class TooLittleException extends Exception {
	private $num;

	function TooLittleException($num) {
		parent::exception();
		$this->num = $num;
	}

	function getMessage() {
		return $this->num . " is too small!";
	}
}


define('NUM', 10);
try {
	if (NUM < 20) {
		throw new TooLittleException(NUM);
	}
} catch (TooLittleException $e) {
	echo $e->getMessage();
	echo "\n<br />\nIn file: ";
	echo $e->getFile();
	echo "\n<br />\n";
}
?>

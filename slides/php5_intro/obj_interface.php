<?php
interface read_file {
	function open($file_name);
	function read($bytes);
	function close();
}

class rf implements read_file {
	private $fp;

	function open($file_name) { $this->fp = fopen($file_name, "r"); }
	function read($bytes) { return fread($this->fp, $bytes); }
	function close() { fclose($this->fp); }
}

$f = new rf();
/* ensure that object inside $ implements read_file interface */
if ($f instanceof read_file) {
	$f->open(__FILE__);
	echo $f->read(4);
	$f->close();	
}
?>
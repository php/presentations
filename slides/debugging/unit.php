<?php
/* file_get_contents() emulation for older PHPs */
function file_get_contents_ex($path)
{
	$fp = fopen($path, "rb");
	if (!$fp) {
		return FALSE;
	}

	$data = '';
	if (@file_exists($path)) {
		$data = fread($fp, filesize($path));
	} else {
		while (($line = fread($fp, 1024 * 1024))) {
			$data .= $line;
		}		
	}
	fclose($fp);

	return ($data ? $data : FALSE);
}

// Include PHPUnit from PEAR
require_once('PHPUnit.php');

class fgcTest extends PHPUnit_TestCase {
	function fgcTest($name) {
		// run PHPUnit constructor
		$this->PHPUnit_TestCase($name);
	}

	function test_local_file() {
		$my_code = file_get_contents_ex(__FILE__);
		$php_code = file_get_contents(__FILE__);
		// determine if the data is indetical
		$this->assertTrue($my_code == $php_code);
	}

	function test_remote_file() {
		$my_code = file_get_contents_ex("http://localhost/");
		$php_code = file_get_contents("http://localhost/");
		$this->assertTrue($my_code == $php_code);
	}

	function test_invalid_local_file() {
		$my_code = @file_get_contents_ex("/foo/bar");
		$php_code = @file_get_contents("/foo/bar");
		$this->assertTrue($my_code == $php_code);
	}
}

$suite  = new PHPUnit_TestSuite("fgcTest");
$result = PHPUnit::run($suite);
echo nl2br($result->toString());
?>
<?php
require_once('PHPUnit.php');
require_once('url_parser1.php');

class test_url_parser extends PHPUnit_TestCase {
	private $data = 'This is some sample data with 
     a <a title=">" href="http://www.google.com/">link</a>
     or <a href="http://www.alltheweb.com/">two</a>.';

	function test_left_bracket() {
		$u = new url_parser;
		$u->search_document($this->data);
		self::assertEquals('http://www.google.com/', 
						   $u->url_list[0]);
	}
}

$suite = new PHPUnit_TestSuite();
$suite->addTest(new test_url_parser('test_left_bracket'));

$result = PHPUnit::run($suite);
echo nl2br($result->toString());
?>

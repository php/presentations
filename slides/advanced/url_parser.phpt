<?php
require_once('PHPUnit.php');
require_once('url_parser.php');

class test_url_parser extends PHPUnit_TestCase {
	private $data = 'This is some sample data with 
     a <a href="http://www.google.com/">link</a>
     or <a href="http://www.alltheweb.com/">two</a>.';

	function test_link_list() {
		$u = new url_parser;
		$u->search_document($this->data);
		self::assertEquals('http://www.google.com/', 
						   $u->url_list[0]);
	}
}

$suite = new PHPUnit_TestSuite();
$suite->addTest(new test_url_parser('test_link_list'));

$result = PHPUnit::run($suite);
echo nl2br($result->toString());
?>

<?php
require_once('PHPUnit.php');
require_once('UrlParser.php');

class Test_UrlParser_Link extends PHPUnit_TestCase {
  private $data = 'This is some sample data with 
    a <a href="http://www.google.com/">link</a>
    or <a href="http://www.alltheweb.com/">two</a>.';

  function TestLink() {
    $u = new UrlParser();
    $u->SearchText($this->data);
    self::assertEquals('http://www.google.com/', 
                       $u->GetUrl(0));
  }
}

$suite = new PHPUnit_TestSuite();
$suite->addTest(new Test_UrlParser_Link('TestLink'));

$result = PHPUnit::run($suite);
echo nl2br($result->toString());
?>

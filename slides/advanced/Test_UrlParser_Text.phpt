<?php
require_once('PHPUnit.php');
require_once('UrlParser1.php');

class Test_UrlParser_TagText extends PHPUnit_TestCase {
  private $data = 
    '<a href="link.html">This <i>is</i> bad.</a>';

  function Test_TagText() {
    $up = new UrlParser();
    $up->SearchText($this->data);
    self::assertEquals('This <i>is</i> bad.', 
                       $up->GetTitle(0));
  }
}

$suite = new PHPUnit_TestSuite();
$suite->addTest(new Test_UrlParser_TagText('Test_TagText'));

$result = PHPUnit::run($suite);
echo nl2br($result->toString());
?>

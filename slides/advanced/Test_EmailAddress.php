<?php
require_once('PHPUnit.php');
require_once('EmailAddress.php');

class Test_EmailAddress extends PHPUnit_TestCase {
	function Test_UserPart() {
		$email = new EmailAddress('sterling@php.net');
		self::assertTrue($email->user == 'sterling');
	}

	function Test_ServerPart() {
		$email = new EmailAddress('sterling@php.net');
		self::assertTrue($email->host == 'php.net');
	}
}

$suite = new PHPUnit_TestSuite();
$suite->addTest(new Test_EmailAddress('Test_UserPart'));
$suite->addTest(
	new Test_EmailAddress('Test_ServerPart')
);

$result = PHPUnit::run($suite);
echo $result->toString();
?>

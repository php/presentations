<?php
require_once('PHPUnit.php');
require_once('EmailAddress.php');

class Test_EmailAddress extends PHPUnit_TestCase {
	private $address = 'sterling@php.net';
	
	function Test_UserPart() {
		$email = new EmailAddress($this->address);
		self::assertTrue(
			$email->user == 'sterling',
		    "{$email->host} != {$this->address}\n"
		);
	}

	function Test_ServerPart() {
		$email = new EmailAddress($this->address);
		self::assertEquals($email->host, 'php.net');
	}
}

$suite = new PHPUnit_TestSuite();
$suite->addTest(new Test_EmailAddress('Test_UserPart'));
$suite->addTest(
	new Test_EmailAddress('Test_ServerPart')
);

$result = PHPUnit::run($suite);
echo nl2br($result->toString());
?>

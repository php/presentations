<?php
class info {
	function version() { return php_version(); }
	function name() { return php_uname(); }
}

$server = new SoapServer("urn:Object"); // create SOAP server object
$server->setClass('info'); // set available methods based on a class
$server->handle(); // handle requests
?>
<?php

class ServerHandler_Round2Base implements SOAP_Service {

    public static function getSOAPServiceNamespace()
	{ return 'http://soapinterop.org/'; }

    public static function getSOAPServiceName()
	{ return 'ExampleService'; }

    public static function getSOAPServiceDescription()
	{ return 'Just a simple example.'; }

    public static function getWSDLURI()
	{ return 'http://localhost/soap/tests/interop.wsdl'; }

    public function echoString($inputString)
    {
	return array('return' => (string)$inputString);
    }
}

$server = new SOAP_Server;

require_once 'ServerHandler_Round2Base.php';

$soapclass = new ServerHandler_Round2Base();
$server->addService($soapclass);

if (isset($_SERVER['REQUEST_METHOD']) &&
    $_SERVER['REQUEST_METHOD']=='POST') {
    $server->service('php://input');
}

?>
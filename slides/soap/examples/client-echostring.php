<?php
include("SOAP/Client.php");

$WSDL =& new SOAP_WSDL('http://localhost/server.php?wsdl');
$soapclient =& $WSDL->getProxy();

$ret = $soapclient->echoStringSimple('Hello World');
print_r($ret);
?>
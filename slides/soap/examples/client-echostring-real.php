<?php
include("SOAP/Client.php");

$wsdlurl = "http://{$_SERVER['SERVER_NAME']}:{$_SERVER['SERVER_PORT']}/".dirname($PHP_SELF)."/presentations/slides/soap/server.php?wsdl";

$WSDL =& new SOAP_WSDL($wsdlurl);
$soapclient =& $WSDL->getProxy();

$text = isset($_GET['text'])?$_GET['text']:"Hello World";

$ret =& $soapclient->echoStringSimple($text);
print_r($ret);
?>
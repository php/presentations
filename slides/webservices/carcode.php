<?php
require_once('SOAP/Client.php'); 
$wsdl = new SOAP_WSDL('CarRentalQuotes.wsdl');
echo $wsdl->generateProxyCode();
?>

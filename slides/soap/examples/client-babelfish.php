<?php
include("SOAP/Client.php");

$wsdl_url = 'http://www.xmethods.net/sd/2001/BabelFishService.wsdl';

$WSDL =& new SOAP_WSDL($wsdl_url);
$soapclient =& $WSDL->getProxy();

echo $soapclient->BabelFish('en_it','Hello World!');
?>
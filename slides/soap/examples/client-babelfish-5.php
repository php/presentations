<?php
include("SOAP/Client.php");

$wsdl_url = 'http://www.xmethods.net/sd/2001/BabelFishService.wsdl';

$ret = new SOAP_WSDL($wsdl_url)->getProxy()->BabelFish('en_it','Hello World!');
print_r($ret);
?>
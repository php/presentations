<?php
require_once('SOAP/Client.php');

$wsdlurl = 'BabelFishService.wsdl';

$WSDL = new SOAP_WSDL($wsdlurl);
$babel = $WSDL->getProxy();

echo $babel->BabelFish('de_en', 'Unser erstes SOAP Beispiel');
?>

<?php
include("SOAP/Client.php");

$WSDL =& new SOAP_WSDL('http://www.xmethods.net/sd/2001/BabelFishService.wsdl');
$soapclient =& $WSDL->getProxy();

$time = time()-(3*60*60);
$default = "It's ".date('g:i A',$time)." in Vancouver, thank God for Coffee!";
$text = isset($_GET['text'])?$_GET['text']:$default;
$trans = isset($_GET['translation'])?$_GET['translation']:'en_es';
$soapclient->setOpt('trace',1);

$ret = $soapclient->BabelFish($trans,$text);
print htmlentities($ret,ENT_NOQUOTES,$soapclient->__result_encoding);
?>
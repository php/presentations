<?php
require_once 'SOAP/Server.php';

$server =& new SOAP_Server;

/* tell server to translate to classes we provide if possible */
$server->_auto_translation = true;

require_once './example_server.php';

$soapclass =& new SOAP_Example_Server();
$server->addObjectMap($soapclass,'urn:SOAP_Example_Server');

if (isset($_SERVER['REQUEST_METHOD']) &&
    $_SERVER['REQUEST_METHOD']=='POST') {
    $server->service($HTTP_RAW_POST_DATA);
} else {
    require_once 'SOAP/Disco.php';
    $disco = new SOAP_DISCO_Server($server,'ServerExample');
    echo $disco->getWSDL();
    return;
    header("Content-type: text/xml");
    if (isset($_SERVER['QUERY_STRING']) &&
       strcasecmp($_SERVER['QUERY_STRING'],'wsdl')==0) {
        echo $disco->getWSDL();
    } else {
        echo $disco->getDISCO();
    }
    exit;
}
?>
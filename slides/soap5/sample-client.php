<?php

$c = new SOAP_Client('http://localhost/example.wsdl');

$ret = $c->echoStruct(new SOAPStruct)
                    ->deserializeBody();

var_dump($ret);

?>
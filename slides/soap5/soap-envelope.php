<?php

$request = SOAP_Envelope::request($wsdlURI);
$request->addMethod($method, $args);
$data = $request->saveXML();

$headers = "User-Agent: PEAR-SOAP\r\n".
    "Content-Type: text/xml; charset={$this->_encoding}\r\n".
    "Content-Length: ".strlen($data)."\r\n".
    "SOAPAction: \"{$request->soapAction}\"\r\n";

$opts = array(
  $url['scheme'] => array(
    'method' => 'POST',
    'header' => $headers,
    'content' => $data
  )
);

$response = SOAP_Envelope::parse($endpointURI, $opts);

$result = $response->deserializeBody();
?>
<?php
$url = 'http://localhost/soap/tests/interop.wsdl';

$result = WSDLManager::get($url);

print $result->generateProxyCode();

?>
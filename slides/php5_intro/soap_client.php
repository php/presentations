<?php
// instantiate SOAP client object
$client =
  new SoapObject("http://example.com/soap_server.php", "urn:Object");
echo $client->version(); // call version() method
?>

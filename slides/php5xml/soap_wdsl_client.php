<?php
/* create a new SOAP client based on given wsdl file */
$client = new SoapClient("WhoisData.wsdl");

/* run a whois query by calling getWhoisData method provided by
 * whois server and described by WhoisData.wsdl */
$result = $client->getWhoisData(
	/* create parameters needed for the request */
	new SoapParam("php.net", "domain"),
	new SoapParam("1234", "clientID"),
	new SoapParam("emailAddress", "user@domain.com")
);
?>
<?php
	// PEAR::SOAP
	require('SOAP/Client.php');

	// Description of the API
	$wsdl_url = 'WhoisData.wsdl';
	$WSDL = new SOAP_WSDL($wsdl_url);

	// Fetch supported types & methods
	$whois = $WSDL->getProxy(); 
	
	// make an array of parameters we need to pass
	$params = array('domain' => 'php.net',
			'clientID' => '1234',
			'emailAddress' => 'ilia@prohost.org'
		);

	// Send whois request for php.net
	$result = $whois->getWhoisData($params);
?>
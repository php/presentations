<?php
include_once 'SOAP/Client.php';

$key = 'xxxxxxxxxxxxxxxx'

$query = array(
		'key' => $key,
		'q' => 'link:metallo.scripps.edu',
		'start' => 0,
		'maxResults' => 10,
		'filter' => true,
		'restrict' => '',
		'safeSearch' => false,
		'lr' => '',
		'ie' => '',
		'oe' => ''
	);

$wsdl = new SOAP_WSDL('GoogleSearch.wsdl');
$client = $wsdl->getProxy();
$result = $client->doGoogleSearch($query)
print_r($result);
?>

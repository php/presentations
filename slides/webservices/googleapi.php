<?php
require_once('SOAP/Client.php');

$key = 'cSlFdvpQFHIiGEpLTO2YzQq55k1G4519';
$query = '"Sterling Hughes"';

$wsdlurl = 'GoogleSearch.wsdl';
$WSDL = new SOAP_WSDL($wsdlurl);
$client = $WSDL->getProxy();
$response = $client->doGoogleSearch($key, $query, 0, 10,
							        false, '', false, '', '', '');

foreach ($response->resultElements as $result)
{
	echo str_repeat(' ', 40);
	strip_html($result->title);
	echo "{$result->title}\n";
	echo str_repeat(' ', 40);
	echo "({$result->URL})\n";
	echo "\n";
	strip_html($result->snippet);
	echo $result->snippet;
	echo "\n\n";
}

function strip_html(&$text) {
	$text = preg_replace('/<.*?>/', '', $text);
}
?>

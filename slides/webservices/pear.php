<?php
require_once('XML/RPC.php');

$client = new XML_RPC_Client('/xmlrpc.php', 'pear.php.net');

$args[0] = new XML_RPC_Value;
$args[0]->addScalar(true, $XML_RPC_Boolean);

$result = $client->send(
	new XML_RPC_Message('package.listAll', $args)
);

if ($result->faultCode()) {
	echo 'Error, ' . $result->faultString() . "\n<br/>\n";
}

$packages = XML_RPC_decode($result->value());
$last_category = false;

foreach ($packages as $name => $info) {
	if ($last_category != $info['category']) {
		echo str_repeat(' ', 40);
		echo "{$info['category']}\n";
		$last_category = $info['category'];
	}
	
	echo "Name: $name\n";
	echo "Summary: {$info['summary']}\n";
	echo "State: {$info['state']}\n";
	echo "\n\n";
}
?>

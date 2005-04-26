<?php
require_once 'XML/RPC.php';

$client = new XML_RPC_Client('/xmlrpc.php', 'pear.php.net');

$args[0] = new XML_RPC_Value;
$args[0]->addScalar("Math_Quaternion", $XML_RPC_String);
$msg = new XML_RPC_Message('package.info', $args);

$result = $client->send($msg);

if ($result->faultCode()) {
	die($result->faultString());
}

$info = XML_RPC_decode($result->value());
$release = array_shift($info['releases']);

echo <<< XML_RPC_INFO

Package:
{$info['name']}

Summary:
{$info['summary']}
Description:
{$info['description']}

Category	{$info['category']}
Maintainers     {$release['doneby']}
Version         {$info['stable']}
Release Date    {$release['releasedate']}
Release License {$info['license']}
Release State   {$release['state']}
Release Notes   {$release['releasenotes']}

XML_RPC_INFO;
?>

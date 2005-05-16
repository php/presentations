<?php
$html = '<html><body>Some random <strong>Bold</strong> 
	and <em>italics</em> text.</body></html>';

$xml = simplexml_load_string($html);
echo $xml->body . "<br />";
echo $xml->body->strong . "<br />";
echo $xml->body->em . "<br />";
?>
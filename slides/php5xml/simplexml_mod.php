<?php
$xml = simplexml_load_file(dirname(__FILE__) . '/thedata.xml');

/* modify all item ids and titles */
foreach ($xml->item as $msg) {
	$msg['id'] += 1000; // increase id by 1000
	$msg->title .= ' ( was modified ) '; // indicate that data was changed
}

/* output modified XML document */
echo '<pre>' . htmlspecialchars($xml->asXML()) . '</pre>';
?>
<?php
/* load a xml file to memory & parse it */
$xml = simplexml_load_file(dirname(__FILE__) . '/thedata.xml');

/* We are done, output time */
foreach ($xml->item as $msg) {
	echo "Title: <a href='{$msg->link}'>{$msg->title}</a> (id: {$msg['id']})
		<br />Body: {$msg->description}<hr />";
}
?>
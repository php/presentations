<?php
	$xml = simplexml_load_file(dirname(__FILE__) . '/thedata.xml');
	// ok we're done.

	$messages = $xml->item;
	foreach ($messages as $msg) {
		// $msg['id'] will access the 'id' attribute
		echo "Title: <a href='{$msg->link}'>{$msg->title}</a><br />Body: {$msg->description}<hr />";
	}
?>
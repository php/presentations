<?php
	include dirname(__FILE__)."/dom_forum.inc.php";

	$dom = new forum();
	$dom->load(dirname(__FILE__)."/thedata.xml");
	$dom->add_entry("Yet Another Message", 
			"http://fud.prohost.org/forum/index.php/m/42",
			"You can never have enough messages.",
			"42");
	$output = $dom->saveXML();

	// output beautification for presentation
	echo nl2br(htmlspecialchars($output));
?>
<?php
	$tidy = new tidy_doc();
	
	/* Set a number of options */

	$tidy->setopt("output-xhtml", true);
	$tidy->setopt("fix-uri", true);
	$tidy->setopt("uppercase-tags", true);
	
	/* Save the configuration file */
	
	$tidy->save_config("myconfig.tcfg");

?>

<?php
/* create directory iterator based on current directory */
$dir = new DirectoryIterator(dirname(__FILE__));
while ($dir->valid()) { // while there are valid entries
	if ($dir->isFile()) { // check if we are dealing with a file
		/* print file name & it's size */
		echo "Name: ".$dir->getFilename().", size: ".$dir->getSize()."<br />";
	}
	$dir->next(); // move to next entry
}
?>
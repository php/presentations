<?php
// generate metaphone of the not found page
$key = metaphone(basename($_SERVER['REDIRECT_URL']));

// get list of files inside the directory 
$files = glob($_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['REDIRECT_URL'])."/*");

$match = array();

// loop through files finding similar sounding ones
foreach ($files as $file) {
	// is we find similar sounding file, store it
	if (metaphone(basename($file)) == $key) {
		$match[] = $file;
	}
}

$dir = dirname($_SERVER['REDIRECT_URL']);

switch (@count($match)) {
	case 1: // if only one suggestion is avaliable redirect the user to that page
		header("Location: {$dir}/{$match[0]}");
		return;
		break;

	case 0: // no matches, no choice but to show site map
		display_site_map();
		break;

	default: // show the user possible alternatives if >1 is found
		echo "The page you requested, '{$_SERVER['REDIRECT_URL']}' cannot be found.<br />\nDid you mean:\n";
		foreach ($match as $url) {
			echo "&nbsp;&nbsp;<a href='{$dir}/{$url}'>{$url}</a><br />\n";
		}
}
?>
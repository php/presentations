<?php
function make_page_lookup_dict($dir)
{
	$old_dir = chdir($dir);

	// generate dictionary key
	$key = md5($dir);

	// create dictionary where the spelling alternatives will be stored
	$ps = pspell_config_create("en");
	pspell_config_personal($ps, "./{$key}.pws");
	$pl = pspell_new_config($ps);

	// fetch all files inside the directory
	$files = glob("*");

	// open db for URL storage
	$db = new sqlite_db("./typos.sqlite");
	$db->query("CREATE TABLE typo (url, key)");

	// append names to dictionary
	foreach ($files as $file) {
		if (preg_match('!^([A-Za-z]+)!', $file, $match)) {
			pspell_add_to_personal($pl, $match[1]);
			$db->query("INSERT INTO typo (url, key)
				VALUES(
				 '".sqlite_escape_string($dir."/".$file)."',
				 '".sqlite_escape_string($match[0])."')
				");
		}
	}

	// save dictionary
	pspell_save_wordlist($pl);
}

function find_my_page()
{
	// get the name of the 'missing' file
	$page = basename($_SERVER['REDIRECT_URL']);

	// used to pick the correct dictionary
	$dir = dirname($_SERVER['REDIRECT_URL']);
	$key = md5($dir);

	// load spelling dictionaries
	$ps = pspell_config_create("en");
	pspell_config_personal($ps, "./{$key}.pws");
	$pl = pspell_new_config($ps);

	// find alternatives
	$alt = pspell_suggest($pl, $page);
	if (!$alt) {
		// no matches, no choice but to show site map
		display_site_map();
		return;
	}

	// escape data for sqlite
	foreach ($alt as $key => $file) {
		$alt[$key] = sqlite_escape_string($file);
	}

	// fetch all matching pages;
	$db = new sqlite_db("./typos.sqlite");
	$alt = $db->single_query("SELECT url FROM typo WHERE key IN('".implode("','", $alt)."')");

	switch (@count($alt)) {
		case 1: // if only one suggestion is avaliable redirect the user to that page
			header("Location: {$alt[0]}");
			return;
			break;

		case 0: // no matches, no choice but to show site map
			display_site_map();
			break;

		default: // show the user possible alternatives if >1 is found
			echo "The page you requested, '{$_SERVER['REDIRECT_URL']}' cannot be found.<br />\nDid you mean:\n";
			foreach ($alt as $url) {
				echo "&nbsp;&nbsp;<a href='{$url}'>{$url}</a><br />\n";
			}
	}
}
?>
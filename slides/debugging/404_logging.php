<?php
// error logging function
function four_oh_four_handler($type, $severity)
{
	// determine if the link leading to the not found page is remote or local
	if (!empty($_SERVER['HTTP_REFERER'])) {
		$remote_or_local = (int) preg_match("!http://[^/]*{$_SERVER['HTTP_HOST']}!", $_SERVER['HTTP_REFERER']);
	} else {
		$remote_or_local = 2; // direct request
	}

	$db = new sqlite_db("error_log");
	$db->query("INSERT INTO web_errors
		(host, request_url, referrer_url, user_ip, 
		 user_browser, notes, request_method,
		 severity, source, time, type)
		VALUES(
		 '".sqlite_escape_string($_SERVER['HTTP_HOST'])."',
		 '".sqlite_escape_string($_SERVER['REDIRECT_URL'])."',
		 '".sqlite_escape_string($_SERVER['HTTP_REFERER'])."',
		 '".sqlite_escape_string($_SERVER['REMOTE_ADDR'])."',
		 '".sqlite_escape_string($_SERVER['HTTP_USER_AGENT'])."',
		 '".sqlite_escape_string($_SERVER['REDIRECT_ERROR_NOTES'])."',
		 '".sqlite_escape_string($_SERVER['REDIRECT_REQUEST_METHOD'])."',
		 '{$severity}',
		 {$remote_or_local},
		 ".time().",
		 '{$type}'
		)
	");
}

// determine what sort of an error is this
if (
	!strncasecmp($_SERVER['REDIRECT_URL'], '/winnt/', strlen('/winnt/')) ||
	!strncasecmp($_SERVER['REDIRECT_URL'], '/scripts/', strlen('/scripts/'))
) {
	trigger_error("Yet another unpatched IIS server at '{$_SERVER['REMOTE_ADDR']}', block with firewall");
	return;
}

// determine the extension of the not found page.
$extension = strtolower(substr(strrchr($_SERVER['REDIRECT_URL'], '.'), 1));

// actual error handling
switch ($extension) {
	case 'php':
	case 'cgi':
		four_oh_four_handler('DYNAMIC', 1);
		// Display a site map to the user so that
		// they can find the page they are looking for.
		display_site_map();
		break;

	case 'html':
	case 'htm':
	case 'shtml':
		four_oh_four_handler('STATIC', 2);
		display_site_map();
		break;

	case 'jpg':
	case 'gif':
	case 'png':
		four_oh_four_handler('IMAGE', 3);
		// to prevent ugly broken image
		// redirect the request to a blank pixel image.
		header("Location: /blank.gif");
		return;
		break;

	default:
		four_oh_four_handler('UNKNOWN', 4);
		display_site_map();
		break;
}
?>
<?php
/* context options */
$opts = array(
	'http' => array (
			'method' => "GET",
			'header' => "Accept-language: en\r\n"
		)
);
/* create context resource */
$context = stream_context_create($opts);

/* Send a request to php.net with specified context options
 * and filter the output via a filter that will remove HTML tags */
$data = file_get_contents(
	"php://filter/read=string.strip_tags/resource=http://www.php.net/", 
	NULL, 
	$context);
?>
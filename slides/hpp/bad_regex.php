<?php
$UNSAFE_HTML = array(
	"!javascript\s*:!is",
	"!vbscri?pt\s*:!is",
	"!<\s*embed.*swf!is",
	"!vbscri?pt\s*:!is",
	"!<[^>]*[^a-z]onabort\s*=!is",
	"!<[^>]*[^a-z]onblur\s*=!is",
	"!<[^>]*[^a-z]onchange\s*=!is",
	"!<[^>]*[^a-z]onfocus\s*=!is",
	"!<[^>]*[^a-z]onmouseout\s*=!is",
	"!<[^>]*[^a-z]onmouseover\s*=!is",
	"!<[^>]*[^a-z]onload\s*=!is",
	"!<[^>]*[^a-z]onreset\s*=!is",
	"!<[^>]*[^a-z]onselect\s*=!is",
	"!<[^>]*[^a-z]onsubmit\s*=!is",
	"!<[^>]*[^a-z]onunload\s*=!is",
	"!<[^>]*[^a-z]onerror\s*=!is",
	"!<[^>]*[^a-z]onclick\s*=!is"
);

function unsafe_html($html) {
	global $UNSAFE_HTML;

	foreach ($UNSAFE_HTML as $match) {
		if (preg_match($match, $html, 
						$matches)) {
			return $match;
		}
	}
	return false;
}
?>

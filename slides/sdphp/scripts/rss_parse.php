<?php
require_once 'XML/RSS.php';

$rssfile = 'sdphp_talks.rss';
$r =& new XML_RSS($rssfile);
$r->parse();
$channel = $r->getChannelInfo();
echo "<h1 align='center'><a href=\"{$channel['link']}\">";
echo "{$channel['title']}</a></h1>\n";
echo "<h2>{$channel['description']}</h2>\n";
echo "<table width='100%' cellspacing='1', border='0'>\n";
foreach ($r->getItems() as $item) {
	echo "<tr><td bgcolor='#000000'>\n";
	echo toHTML($item);
	echo "</td><tr>\n";
}

echo "</table>\n";

function toHTML($item) {
	return "<table width='100%' border=0 cellspacing=0>\n".
		"<tr><th bgcolor='#ffffaa'>{$item['title']}</th></tr>\n".
		"<tr><td bgcolor='#ffffff' align='center'>URL: ".
		"<a href=\"{$item['link']}\"".
		"target='_blank'>{$item['link']}</a></td></tr>\n".
		"<tr><td align='right' bgcolor='ffaaff'>".
		"{$item['description']}</td></tr>\n".
		"</table>\n";
}
?>

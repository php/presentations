<?php
function clean($str)
{
	return str_replace(
		array("</title>", "</link>", "</body>"),
		array("</title><br />\n", "</link><br />\n", "</body><br />\n"), $str);
}
?>
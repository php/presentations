<?php
$x = xslt_create();
$res = xslt_process($x, 'data.rss', 'rss.xsl');
if (!$res) {
	echo xslt_error($x);
}
echo $res;

xslt_free($x);
?>

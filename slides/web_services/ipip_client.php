<html>
<body bgcolor="white">
<div align="center">
<b>Find Assigned Bugs</b>
<?php
	$base = "$PHP_SELF{$_SERVER['PATH_INFO']}";
	$action = isset($_SERVER['QUERY_STRING'])?"{$base}?{$_SERVER['QUERY_STRING']}":$base;
?>
<form action="<?php echo $action; ?>" method="GET">
Developer Name: <input type="text" value="" name="dev_name"> 
<input type="submit" name="submit" value="Search">
</form>
<?php
function decode($data, &$res)
{
	$pos = 0;
	$res = array();
	$num_results = (int) substr($data, 0, 10);
	$pos += 10;
	for ($i = 0; $i < $num_results; $i++) {
		/* decode bug id */
		$len = (int) substr($data, $pos, 10);
		$pos += 10;
		$res[$i]['id'] = substr($data, $pos, $len);
		$pos += $len;

		/* decode bug description */
		$len = (int) substr($data, $pos, 10);
		$pos += 10;
		$res[$i]['descr'] = substr($data, $pos, $len);
		$pos += $len;
	}
	return $num_results;
}

if (!empty($_GET['dev_name'])) {
	$url = 'http://' . $_SERVER['HTTP_HOST'];
	$url .= preg_replace('!show\.php.*$!', 'presentations/slides/web_services/ipip_server.php', $_SERVER["SCRIPT_NAME"]);

	$data = file_get_contents($url."?q=" . urlencode($_GET['dev_name']));

	/* decode the result set */
	$num_results = decode($data, $res);
	if (!$num_results) {
		echo "No results found.";
	} else {
		foreach ($res as $ent) {
			echo "Bug #: {$ent['id']}<br />\n{$ent['descr']}<hr />\n";
		}
	}
}
?>
</div>
</body>
</html>
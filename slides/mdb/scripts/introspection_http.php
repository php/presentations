<?php 
$ini_file=dirname($_SERVER['SCRIPT_FILENAME']).'/oscon2002.ini';
extract(parse_ini_file($ini_file));
$service = $server.$api_uri;
$fp = fopen($service,'r');
$out = '';
while($r = fread($fp,4096))
	$out .= $r;
fclose($fp);
echo $out;
?>

<?php 
include 'slides/mdb/scripts/mdb_tests.cfg';
$service = MDB_SERVER.API_URI;
$fp = fopen($service,'r');
$out = '';
while($r = fread($fp,4096))
	$out .= $r;
fclose($fp);
echo $out;
?>

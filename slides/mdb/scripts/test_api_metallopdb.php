<?php
include 'slides/mdb/scripts/mdb_tests.cfg';
$metal = 'zn';
$format = 'rss';
$mode = 'random';
$func = 'metallopdb';
$count = 5;
$getstr = MDB_SERVER.API_URI;
$getstr .= "?func=$func&metal=$metal";
$getstr .= "&mode=$mode&count=$count&format=$format";
$result = implode("",file($getstr));

echo "<h1 align='center'>Testing the HTTP based API</h1>
<b>Server used:</b> [ ".MDB_SERVER.
"]<br><b>Service:</b>[ ".API_URI."]
<hr>
<h2>Retrieving $count random zinc containing proteins</h2>
<b>Function vars:</b><br>
[metal: $metal]
[count: $count]
[format: $format]
[mode: $mode]
<br><b>Using the URL: </b>".
wordwrap($getstr,45,"<br>\n",true).
"<br><b>RESULT</b><br>
<pre>\n";
echo htmlspecialchars($result)."\n</pre>\n";
?>


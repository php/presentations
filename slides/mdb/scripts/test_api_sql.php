<?php
include 'slides/mdb/scripts/mdb_tests.cfg';
$query = "select source_id,expdata,description from protein ";
$query .= "where expdata not like '%nmr%' limit 4";
$format = "table";
$q = urlencode($query);
$func = "sql";
$getstr = MDB_SERVER.API_URI;
$getstr .= "?func=$func&query=$q&format=$format";
$result = implode('',file($getstr));

echo "<h1 align='center'>Testing the HTTP based API</h1>
<b>Server used:</b> [ ".MDB_SERVER.
"]<br><b>Service:</b>[ ".API_URI."]
<hr>
<h2>SQL query function</h2>
<b>Function vars:</b><br>
[query: $query]<br>
[format: $format]
<br><b>Using the URL: </b>".
wordwrap($getstr,45,"<br>\n",true).
"<br><b>RESULT</b><br>
$result\n";
?>

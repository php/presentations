<?php
$server = 'http://metallo.scripps.edu';
$api_uri = '/services/api.php';
$query = "select source_id,expdata,description from protein limit 3";
$format = "table";
$q = urlencode($query);
$func = "sql";
$getstr = "{$server}{$api_uri}";
$getstr .= "?func=sql&query=$q&format=$format";
$result = implode("",file($getstr));

echo "<h1 align='center'>Testing the HTTP based API</h1>
<b>Server used:</b> [ $server ]
<b>Service:</b>[ $api_uri ]
<hr>\n<h2>SQL query function</h2>
<b>Function vars:</b>
[query: $query]
[format: $format]
<br><b>Using the URL: </b>
$getstr
<br><b>RESULT</b><br>
$result\n";
?>

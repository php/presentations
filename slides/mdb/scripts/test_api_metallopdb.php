<?php
$server = 'http://metallo.scripps.edu';
$api_uri = '/services/api.php';
$query = "select source_id,expdata,description from protein limit 3";
$format = "rss";
$mode = 'random';
$q = urlencode($query);
$func = "sql";
$getstr = "{$server}{$api_uri}";
$getstr .= "?func=metallopdb&metal=zn&mode=$mode&count=5&format=$format";
$result = implode("",file($getstr));

echo "<h1 align='center'>Testing the HTTP based API</h1>
<b>Server used:</b> [ $server ]
<b>Service:</b>[ $api_uri ]
<hr>\n<h2>Retrieving 3 random zinc containing proteins</h2>
<b>Function vars:</b>
[query: $query]
[metal: zn]
[format: $format]
[mode: $mode]
<br><b>Using the URL: </b>
$getstr
<br><b>RESULT</b><br>
<pre>\n";
echo htmlspecialchars($result)."\n</pre>\n";
?>


<?php
$db = sqlite_open(':memory:', 0666, $sqliteerror);

if ($db) {

  sqlite_query($db,
	       'CREATE TABLE foo (bar varchar(10))');
  sqlite_query($db,
	       "INSERT INTO foo VALUES ('fnord')");

  $result = sqlite_query($db,'select bar from foo');
  $record = sqlite_fetch_array($result);

  echo "<pre>";
  var_dump($record);
  echo "</pre>";

} else {
  die ($sqliteerror);
}
?> 
<?php
@exec('rm /tmp/lb.db');
$db = sqlite_open('/tmp/lb.db', 0666, $sqliteerror);
if ($db) {
  sqlite_query($db, 'CREATE TABLE foo (bar varchar(10))');
  sqlite_query($db, "INSERT INTO foo VALUES ('fnord')");

  $result = sqlite_query($db,'select bar from foo');
  $record = sqlite_fetch_array($result);
  var_dump($record);
} else {
  die ($sqliteerror);
}
?> 

<?php
class Globals {
	static $NAME = "sterling";
	static $HOST = "localhost";
	static $USER = "sterling";
	static $PASS = "itsasecret";
}

echo Globals::$NAME;
echo "\n<br />\n";
Globals::$HOST = "db42.pair.com";
echo Globals::$HOST;
echo "\n<br />\n";
?>

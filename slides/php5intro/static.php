<?php
namespace DB {
	class Globals {
		static $NAME = "sterling";
		static $HOST = "localhost";
		static $USER = "sterling";
		static $PASS = "itsasecret";
	}
}

echo DB::Globals::$NAME;
echo "\n<br />\n";
DB::Globals::$HOST = "db42.pair.com";
echo DB::Globals::$HOST;
echo "\n<br />\n";
?>

<?php
try { /* code to monitor for errors */
	$db = new sqlite_db("new_db");
	$result = $db->query("SELECT ...", SQLITE_ASSOC);
	while (($row = $result->fetch_object())) {
		/* output code */
	}
}
catch (sqlite_exception $err) { /* error handling */
	echo "Message: ".$err->getMessage()."\n";
	echo "File: ".$err->getFile()."\n";
	echo "File: ".$err->getCode()."\n";
	echo "Line: ".$err->getLine()."\n";
	print_r($err->getTrace()); /* backtrace array */
	echo "BackTrace: ".$err->getTraceAsString()."\n";
}
?>
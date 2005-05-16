<?php
try { /* begin exception block */
	$fp = fopen(__FILE__, "r");
	if (!$fp) {
		/* throw exception, error occurred */
		throw new Exception('no such file', 9);
	}
} catch (Exception $e) { /* what to do on error (thrown exception) */
	echo $e->getCode(); // error code
	echo $e->getFile(); // file where exception was thrown
	echo $e->getLine(); // line on which exception was thrown
	echo $e->getMessage(); // error message
	print_r($e->getTrace()); // print backtrace
}
?>
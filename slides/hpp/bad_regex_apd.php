<?php
include_once("bad_regex.php");

apd_set_pprof_trace();
$file = file_get_contents($argv[1]);
if (($match = unsafe_html($file)) != false) {
	echo "File is unsafe\n";
	echo "$match\n";
} else {
	echo "File is good\n";
}
?>

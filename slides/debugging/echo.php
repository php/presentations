<?php
foreach ($files as $file) {
	if (metaphone(basename($file)) == $key) {
		echo "Matching file {$file}\n";
		$match[] = $file;
	}
	else echo "Non Matching file {$file}\n";
}
?>
<?php
$dirs = (array) $dir;
while (list(,$v) = each($dirs)) {
	if (!($d = opendir($v))) {
		exit("We demand access!\n");
	}
        while (($f = readdir($d))) {
		if ($f == '.' || $f == '..') {
			continue;
		}
                if (is_file($v . "/" . $f)) {
                	echo "Found {$f} file inside {$v} directory\n";
                } else {
                	echo "Found a new directrory {$v}/{$f}\n";
			$dirs[] = $v . "/" . $f;
		}
	}
	closedir($d);
}
?>
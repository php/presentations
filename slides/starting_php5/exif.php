<?php
$data = exif_read_data(dirname(__FILE__) . '/PDR_1204.JPG'); 
foreach($data as $key=>$val) {
	if (is_array($val)) {
		foreach($val as $k=>$v) {
			echo $key."[$k]: $v<br />\n";
		}
	} else {
		echo "$key: ".htmlspecialchars($val)."<br />\n";
	}
}
?>
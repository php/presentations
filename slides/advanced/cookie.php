<?php
if (isset($_COOKIE['stamp'])) {
	if ($_COOKIE['stamp'] == md5($_COOKIE['data'] . 'SECRETKEY')) {
		echo "valid cookie\n";
	} else {
		echo "tamper temper";
	}
} else {
	$_COOKIE['data'] = '00110100011';
	$_COOKIE['stamp'] = md5($_COOKIE['data'] . 'SECRETKEY');
}
?>

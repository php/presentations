<?php
function hexencode($data) {
	$ascii = unpack("C*", $data);
	$retval = '';
	foreach ($ascii as $v) {
		$retval .= sprintf("%02x", $v);
	}
	return $retval;
}

function hexdecode($data) {
	$len = strlen($data);
	$retval = '';
	for($i=0; $i < $len; $i+= 2) {
		$retval .= pack("C", hexdec(
				substr($data, $i, 2)
			)
		);
	}
	return $retval;
}
?>

<?php
	$allowed_users = array(
		'ilia' => '0b2c539c3e7f85d808df3f2dfe8906b9',
		'derick' => 'ad0234829205b9033196ba818f7a872b',
		'sterling' => '8ad8757baa8564dc136c1e07507f4a98'
	);

	if (isset($HTTP_RAW_POST_DATA)) {
		$data = wddx_deserialize($HTTP_RAW_POST_DATA);
		if (isset($allowed_users[$data['user']])) {
			if ($allowed_users[$data['user']] !== $data['password']) {
				$error = 2;
				$error_str = "Invalid Password for specified account";
				$login = FALSE;
			} else {
				$login = TRUE;
				$error = $error_str = NULL;	
			}
		} else {
			$error = 1;
			$error_str = "Invalid Login Name";
			$login = FALSE;
		}
	} else {
		$error = 3;
		$error_str = "No Input.";
		$login = FALSE;
	}

	$packet_id = wddx_packet_start("Authentication Response");
	wddx_add_vars($packet_id, 'login', 'error', 'error_str');
	echo wddx_packet_end($packet_id);
?>
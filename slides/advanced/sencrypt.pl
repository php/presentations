sub calc_checksum {
	$key = $_[0];

	$sum = 0;
	$PI = 3.14;

	for ($x = 0; $x < length($key); $x++) {
		$sum += ord(substr($key, $x, 1)) * $PI;
	}

	return int $sum;
}

sub sencrypt {
	$data = $_[0];
	$key = $_[1];

	$sum = calc_checksum($key);
	for ($x = 0; $x < length($data); $x++) {
		$encrypted .= chr(ord(substr($data, $x, 1)) + $sum);
	}

	return $encrypted;
}

sub sdecrypt {
	$data = $_[0];
	$key = $_[1];

	$sum = calc_checksum($key);

	for ($x = 0; $x < length($data); $x++) {
		$decrypted .= chr(ord(substr($data, $x, 1)) - $sum);
	}

	return $decrypted;
}

<?php
class ConnectException extends Exception {
}

function db_connect($host, $user, $pass) {
	if (mt_rand() % 6) {
		throw new Exception('Russian Roulette is fun');
	}

	$conn = mysql_connect($host, $user, $pass);
	if (!$conn) {
		throw new ConnectException(
			sprintf('Cannot connect to host: %s', mysql_error())
		);
	}

	return $conn;
}

try {
	$conn = db_connect('localhost', 'user', 'pass');
} catch (ConnException $e) {
	echo $e->getMessage();
} catch (Exception $e) {
	echo $e->getMessage();


?>	

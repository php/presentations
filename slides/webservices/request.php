<?php
$ch = curl_init('http://localhost/presservice.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$data = curl_exec($ch);
if ($data === false) {
	echo 'Error, ' . curl_error($ch) . "\n";
}
curl_close($ch);

echo "Contents: $data\n";
?>

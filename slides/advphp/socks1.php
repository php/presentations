<?php
$fp = fsockopen ("www.php.net", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br>\n";
} 

fputs ($fp, "GET / HTTP/1.0\r\nHost: www.php.net\r\n\r\n");
while (!feof($fp)) {
    echo fgets ($fp,128);
}
fclose ($fp);
?>

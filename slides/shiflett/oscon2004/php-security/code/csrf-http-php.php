<?php

$request = '';
$request .= "{$_SERVER['REQUEST_METHOD']} ";
$request .= "{$_SERVER['REQUEST_URI']} ";
$request .= "{$_SERVER['SERVER_PROTOCOL']}\r\n";
$request .= "Host: {$_SERVER['HTTP_HOST']}\r\n";
$request .=
"User-Agent: {$_SERVER['HTTP_USER_AGENT']}\r\n";
$request .=
"Accept: {$_SERVER['HTTP_ACCEPT']}\r\n\r\n";

?>

<?php

$token = md5(uniqid(rand(), true));

$_SESSION['token'] = $token;

?>

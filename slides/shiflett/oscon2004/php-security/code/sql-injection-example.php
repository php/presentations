<?php

$sql = "INSERT
        INTO users (reg_username,
                    reg_password,
                    reg_email)
        VALUES (' bad_guy', 'mypass', ''),
               ('good_guy',
                '1234',
                'shiflett@php.net')";

?>

<?php

$sql = "INSERT
        INTO users (reg_username,
                    reg_password,
                    reg_email)
        VALUES ('{$_POST['reg_username']}',
                '$reg_password',
                '{$_POST['reg_email']}')";

?>

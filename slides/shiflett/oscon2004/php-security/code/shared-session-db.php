<?php

session_set_save_handler('db_connect',
                         'db_disconnect',
                         'sess_get',
                         'sess_put',
                         'sess_del',
                         'sess_clean');

/* See workbook for examples of these functions */

?>


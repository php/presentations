<?php

error_reporting(E_ALL & ~E_NOTICE);

require_once 'PEAR.php';
require_once 'Log.php';
require_once 'DB.php';

DEFINE('PEAR_WIKI_VERSION', '0.1');
PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'errorHandler');
$dsn = 'mysql://localhost/test';
$dbh = DB::connect($dsn);
$dbh->setFetchMode(DB_FETCHMODE_ASSOC);
$logger = Log::factory("syslog");

include 'auth.php';

function errorHandler($error)
{
    ob_end_clean();
    print '<h2 style="color:#990000">';
    print $error->getMessage();
    print "</h2>\n<pre>";
    print $error->getUserInfo();
    print "</pre>\n";
    exit;
}

function unhtmlentities ($string)
{
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    return strtr($string, $trans_tbl);
}

function pre_dump($foo)
{
    print "<pre>";
    var_dump($foo);
    print "</pre>";
}

?>
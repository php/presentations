<?php

include 'MyConnect.php';
include 'Cipher.php';
include 'SharedKeys.php';

ob_start();

mysql_query( "DROP TABLE IF EXISTS equal_opps" );

$query = <<<EOS
CREATE TABLE equal_opps (
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    sender      VARCHAR(64) NOT NULL,        
    recipients  TEXT NOT NULL,
    message     BLOB NOT NULL,
    PRIMARY KEY (id)
)
EOS;

mysql_query($query)
    or die("Could not execute query '$query' : " . mysql_error());

$message = <<<EOS
Sam Poblano from NetTech books is looking for an
author for a book titled 'MySQL and PHP for 
Southern Germans'.
The job details are ...
EOS;

$key = "Usually Random!";

$cipher = new Cipher($key);

$recipients = array(
    'georg@php.net',
    'hartmut@php.net',
    'sandro@zzoss.com'
);

$query = sprintf(
    "INSERT equal_opps (sender, recipients, message) VALUES ('%s', '%s', '%s')",
    'zak@mysql.com',
    join( ',', $recipients ),
    mysql_escape_string( $cipher->Encrypt($message) )
);

mysql_query( $query )
    or die("Could not execute query '$query'");

$query = "SELECT * FROM equal_opps";

echo $query, "\n", str_repeat('-', strlen($query)), "\n";
$qh = mysql_query( $query )
    or die("Could not execute query '$query'");

foreach( mysql_fetch_assoc( $qh ) as $k => $v ){
    printf( "%-12s: %s\n", $k, $v );
}

echo "\n\n", $msg = "Keys Generated for Recipients", "\n",
     str_repeat('-', strlen($msg)), "\n";
$keys = SharedKeys::Create( $key, count($recipients) );
foreach($keys as $index => $key){
    printf( "%-18s: %s\n", $recipients[$index], $key );
}

$msg = "Re-assembling Keys using 'SharedKeys::Assemble( array(\"".
        join("\",\n \"", $keys) ."\") );'";

echo "\n\n", $msg, "\n";
echo "Reassembled Key is: ", SharedKeys::Assemble( $keys );


$qh = mysql_query( "DROP TABLE equal_opps");
$cipher->Cleanup();
$out = ob_get_contents();
ob_end_clean();
echo nl2br($out);
?>

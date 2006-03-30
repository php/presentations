<pre>
<?php
require 'ezc_mail_setup.php';
error_reporting(E_ALL);

$parser = new ezcMailParser();
$set = new ezcSingleFileSet( dirname(__FILE__).'/ezcmailtest.mail' );
echo "Memory: ", xdebug_memory_usage(), " bytes\n\n";

$mail = $parser->parseMail( $set );
foreach( $mail as $mailPart )
{
	echo "From: {$mailPart->from->email}\n";
	echo "Subject: {$mailPart->subject}\n";
}
unset( $mail );

echo "\nMaximum Memory: ", xdebug_peak_memory_usage(), " bytes\n";
?>

<?php
require 'ezc-setup.php';
$dir = dirname( __FILE__ );

$mail = new ezcMailComposer();
$mail->from = new ezcMailAddress( 'john@doe.com', 'John Doe' );
$mail->addTo( new ezcMailAddress( 'dr@ez.no', 'Derick Rethans' ) );

$mail->subject = "Example of an HTML email with attachments";
$mail->plainText = "Here is the text version of the mail.
This is displayed if the client can not understand HTML";

$mail->htmlText = <<<ENDHTML
<html>
Here is the HTML version of your mail
with an image: <img src='file://$dir/consoletools-table.png'/>
</html>
ENDHTML;

$mail->addAttachment( "$dir/mail.php" );
$mail->build();

echo "<pre><font size='4'>",
	htmlspecialchars(
		$mail->generateHeaders() . "\r\n" . $mail->generateBody() );
	
$transport = new ezcMailTransportSmtp( 'localhost', null, null, 2525 );
//$transport->send( $mail );
?>

<?php
require 'ezc-setup.php';
$mail = new ezcMailComposer();

// from and to addresses, and subject
$mail->from = new ezcMailAddress( 'john@doe.com', 'John Doe' );
$mail->addTo( new ezcMailAddress( 'dr@ez.no', 'Derick Rethans' ) );
$mail->subject = "Example of an HTML email with attachments";

// body: plain
$mail->plainText = "Here is the text version of the mail.";

// body: html
$mail->htmlText = <<<ENDHTML
<html>Here is the HTML version of your mail with an image: <img
src='file://$dir/consoletools-table.png'/></html>
ENDHTML;

// add an attachment
$mail->addAttachment( "$dir/mail.php" );

// send the mail
$transport = new ezcMailTransportSmtp( 'localhost', null, null, 2525 );
$transport->send( $mail );
?>

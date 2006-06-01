<pre><font size="4"><?php
require 'ezc-setup.php';

$mbox = new ezcMailMboxTransport( dirname( __FILE__ ) . "/mbox-example.mbox" );
$set = $mbox->fetchAll();
$parser = new ezcMailParser();
$mail = $parser->parseMail( $set );
showParts( $mail[0], 0 );


function showParts( $mail, $level )
{
	switch ( get_class( $mail ) )
	{
		case 'ezcMail':
			printf( "%s%s\n", str_repeat( '  ', $level ),
				'Mail' );
			showParts( $mail->body, $level + 1);
			break;
			
		case 'ezcMailText':
			printf( "%s%s (%s, %s)\n", str_repeat( '  ', $level ),
				'Text', $mail->subType, $mail->charset );
			echo "---\n", htmlspecialchars( $mail->text ), "\n---\n";
			break;
			
		case 'ezcMailFile':
			printf( "%s%s (%s)\n", str_repeat( '  ', $level ),
				'File', $mail->fileName );
			break;
			
		case 'ezcMailMultipartMixed':
			printf( "%s%s\n", str_repeat( '  ', $level ),
				'Multipart (mixed)' );
			foreach( $mail->getParts() as $part )
			{
				showParts( $part, $level + 1);
			}
			break;
			
		case 'ezcMailMultipartAlternative':
			printf( "%s%s\n", str_repeat( '  ', $level ),
				'Multipart (alternative)' );
			foreach( $mail->getParts() as $part )
			{
				showParts( $part, $level + 1);
			}
			break;
			
		case 'ezcMailMultipartRelated':
			printf( "%s%s\n", str_repeat( '  ', $level ),
				'Multipart (mixed)' );
			$mail = fixLinks( $mail );
			showParts( $mail->getMainPart(), $level + 1 );
			foreach( $mail->getRelatedParts() as $part )
			{
				showParts( $part, $level + 1);
			}
			break;
	}
}

function fixLinks( $mail )
{
	global $tmpMail;

	$tmpMail = $mail;
	$mail->getMainPart()->text = preg_replace_callback( "@['\"]cid:([^'\"]+)@", "fixLink", $mail->getMainPart()->text );
	return $mail;
}

function fixLink( $args )
{
	global $tmpMail;
	
	$fileName = $tmpMail->getRelatedPartByID( $args[1] )->fileName;
	return "'file://$fileName";
}
?>

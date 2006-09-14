<pre><font size="4"><?php
require 'ezc-setup.php';
require 'mail-parse2b.php';

$set = new ezcMailFileSet( array( dirname( __FILE__ ) . "/mail-example.mail" ) );
$parser = new ezcMailParser();
$mail = $parser->parseMail( $set );
echo htmlspecialchars( formatMail( $mail[0] ) );

?>

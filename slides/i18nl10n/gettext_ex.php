<?php
bindtextdomain('messages', './');

switch ($argv[1]) {
	case 'de':
		putenv("LC_ALL=de");
		break;
	case 'en':
	default:
		putenv("LC_ALL=en");
		break;
}


print _("Hey");
print "\n<br>\n";
print _("This is example number ") . "2!";
?>

<?php
switch ($argv[1]) {
	case 'de':
		include_once('./simple_defs_de.php');
		break;
	case 'en':
	default:
		include_once('./simple_defs_en.php');
		break;
}

print SAMPLE_HELLO;
print "\n<br>\n";
print sprintf(SAMPLE_EX, 1);
?>

<?php
namespace Languages:Perl {
	class Execute {
		function statement($cmd) {
			$cmd = escapeshellcmd($cmd);
			system("echo $cmd | perl");
		}
	}

	class Insult {
		function oneLiner() {
			echo "Perl is soo ugly, even ";
			echo "Microsoft can't embrace it";
			echo "\n<br />\n";
		}
	}
}

$e = new Languages:Perl::Execute;
$e->statement("print 'Hello World!'");
echo "\n<br />\n";
$i = new Languages:Perl::Insult;
$i->oneLiner();
?>

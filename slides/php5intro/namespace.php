<?php
namespace Language {
	class Python {
		function exec_stmt($stmt) {
			$command = escapeshellcmd($stmt);
			system("echo $command | python");
		}
			
	}

	class Perl {
		function exec_stmt($stmt) {
			$command = escapeshellcmd($stmt);
			system("echo $command | perl");
		}
	}

	class PHP {
		function exec_stmt($stmt) {
			eval($stmt);
		}
	}
}

$p = new Language::Perl;
$p->exec_stmt("print 'Hello Freaky Deaky World!'");
?>

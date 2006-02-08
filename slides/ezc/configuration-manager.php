<?php
require 'ezc-setup.php';

$cfg = ezcConfigurationManager::getInstance();
$cfg->init( 'ezcConfigurationIniReader', dirname( __FILE__ ). '/cfg' );

$pw = $cfg->getSetting( 'example', 'db', 'password' );
echo "The password is '$pw'.\n";
?>

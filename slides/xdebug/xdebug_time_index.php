<pre>
<?php
require_once 'ezc/Base/base.php';

function __autoload( $className )
{
    ezcBase::autoload( $className );
}

$cfg = ezcConfigurationManager::getInstance();
$cfg->init( 'ezcConfigurationIniReader', dirname( __FILE__ ) . '/examples' );

echo "Time Index: ", xdebug_time_index(), "\n";
$pw = $cfg->getSetting( 'settings', 'db', 'password' );
echo "The password is <$pw>.\n";
echo "Time Index: ", xdebug_time_index(), "\n";
?>

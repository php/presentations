<?php

class db {
  protected static $dbh = false;

  function connect() {
    self::$dbh = new PDO('sqlite:./model/example.db');
    self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  protected function fatal_error($msg) {
    echo "<pre>Error!: $msg\n";
    $bt = debug_backtrace();
    foreach($bt as $line) {
      $args = var_export($line['args'], true);
      echo "{$line['function']}($args) at {$line['file']}:{$line['line']}\n";
    }
    echo "</pre>";
    die();
  }
}

// load_list takes a text file and turns it into a global array cached by APC
function load_list($name) {
  global $$name;
  if(!$$name = apc_fetch($name)) {
    $$name = explode("\n",trim(file_get_contents($name.'.txt')));
    apc_store($name,$$name);
  }
}
?>

<?
  function short($str) {
    if(strstr($str,'/'))
      return substr(strrchr($str,'/'),1);
    else return $str;
  }
  function myErrorHandler($errno,$errstr,$errfile,$errline)
  {
    echo "$errno: $errstr in ".short($errfile)." at line $errline<br />\n";
    echo "Backtrace<br />\n";
    $trace = debug_backtrace();
    foreach($trace as $ent) {
      if(isset($ent['file'])) $ent['file'].':';
      if(isset($ent['function'])) {
        echo $ent['function'].'(';
        if(isset($ent['args'])) {
          $args='';
          foreach($ent['args'] as $arg) { $args.=$arg.','; }
          echo rtrim(short($args),',');
        }
        echo ') ';
      }
      if(isset($ent['line'])) echo 'at line '.$ent['line'].' ';
      if(isset($ent['file'])) echo 'in '.short($ent['file']);
      echo "<br />\n";
    }
  }

  set_error_handler('myErrorHandler');
  include 'file2.php';
  test2(1,0);
?>

<?php
  // Sample REST server - returns uptime information
  // Jesus M. Castagnetto
  
  //$host = 'www.example.com';
  //$port = 80;
  //$serverPath = '/xmlrpc/server.php'
  $host = 'jmc.sdsc.edu';
  $port = 6666;
  $serverPath = '/misc/ws_rest_sample_server.php';

  $packet = file_get_contents("http://{$host}:{$port}{$serverPath}");
  $tmp = wddx_deserialize($packet);
  extract($tmp);

  $sep = str_repeat('*',50);
  echo <<< _END
  $sep
  Uptime for               : $host
  Timestamp (UTC)          : $timestamp
  Local time at host       : {$uptime['time']}    
  Host has run for         : {$uptime['duration']}
  Number of current users  : {$uptime['users']}
  Average number of jobs in queue
                  1 minute : {$uptime['load1']}
                 5 minutes : {$uptime['load5']}
                15 minutes : {$uptime['load15']}
  $sep

_END;
?>                                                

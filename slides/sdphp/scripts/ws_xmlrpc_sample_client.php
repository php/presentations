<?php
  require_once 'XML/RPC.php';
  
  //$host = 'www.example.com';
  //$port = 80;
  //$serverPath = /rest/uptime.php';
  $host = 'jmc.sdsc.edu';
  $port = 6666;
  $serverPath = '/misc/ws_xmlrpc_sample_server.php';
  
  $message = new XML_RPC_Message('method.serverUptime');
  $client = new XML_RPC_Client($serverPath, $host, $port); 
  $resp = $client->send($message);
  $value = $resp->value();
  $uptime = $value->getval();

  $sep = str_repeat('~',56);
  echo <<< _END
  $sep
  Uptime for               : $host
  Timestamp (UTC)          : {$uptime['timestampUTC']}
  Local time at host       : {$uptime['timestampLocal']}
  Host has run for         : {$uptime['duration']}
  Number of current users  : {$uptime['users']}
  Average number of jobs in queue
                  1 minute : {$uptime['load1']}
                 5 minutes : {$uptime['load5']}
                15 minutes : {$uptime['load15']}
  $sep

_END;
?>

<?php
  require_once 'XML/RPC/Server.php';
  
  function hostUptime() {
        $now = time();
        $uptime = `uptime`;
        $re = '/^\s*([0-9]{1,2}:[0-9]{2}(am|pm))\s+up (.+),';
        $re .= '\s+(\d+) users,\s+load average: (.+), (.+), (.+)/';
        preg_match($re, $uptime, $part);
  
        // create the XML-RPC values
        $timestamp = new XML_RPC_Value(gmdate('Ymd\TH:i:s', $now), 'dateTime.iso8601');
        $host_ts = new XML_RPC_Value(date('Ymd\TH:i:s', $now), 'dateTime.iso8601');
        $host_uptime = new XML_RPC_Value($part[3], 'string');
        $host_users = new XML_RPC_Value($part[4], 'int');
        $host_load1 = new XML_RPC_Value($part[5], 'double');
        $host_load5 = new XML_RPC_Value($part[6], 'double');
        $host_load15 = new XML_RPC_Value($part[7], 'double');
        $hostInfo = array(
                  'timestampUTC' => $timestamp,
                  'timestampLocal' => $host_ts,
                  'duration' => $host_uptime,
                  'users' => $host_users,
                  'load1' => $host_load1,
                  'load5' => $host_load5,
                  'load15' => $host_load15
              );
        $uptime = new XML_RPC_Value($hostInfo, 'struct');
  
        return new XML_RPC_Response($uptime);
  }
  
  // method metainfo
  $hostUptime_sig = array(array($XML_RPC_Struct));
  $hostUptime_doc = 'Returns the uptime information of the host,'
                    .' and a timestamp (UTC timezone) when the'
                    .' measure was made.';
  
  // dispatch map
  $map = array (
          'method.serverUptime' => array (
                  'function' => 'hostUptime',
                  'signature' => $hostUptime_sig,
                  'docstring' => $hostUptime_doc
              )
          );
  
  // start server
  $server = new XML_RPC_Server($map);
  $server->service();
?>

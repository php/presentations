<?php
    $now = time();
    $uptime = `uptime`;
    $re='/^\s*([0-9]{1,2}:[0-9]{2}(am|pm))\s+up (.+),\s+(\d+) users,\s+load average: (.+), (.+), (.+)/';

    $timestamp = gmdate('Y-m-d H:i:s', $now);
    preg_match($re, $uptime, $part);
    $uptime = array(
            'time'   => $part[1],
            'duration' => $part[3],
            'users'  => (int)$part[4],
            'load1'   => (float)$part[5],
            'load5'   => (float)$part[6],
            'load15'  => (float)$part[7],
        );
    $packet = wddx_packet_start('uptime info');
    wddx_add_vars($packet, 'timestamp', 'uptime');
    $out = wddx_packet_end($packet);
    echo $out;
?>

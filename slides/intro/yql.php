<?php
include 'secrets.inc';
define('MINSZ',10);
function cache($url) {
  $tmp = '/tmp/'.md5($url);
  if(file_exists($tmp)) $st = stat($tmp);
  if(!$st || $st && ($st['size']<MINSZ || $st['mtime']<(time()-7200))) {
    if($st && $st['size']>=MINSZ) touch($tmp);  // Keep re-using entry
    $stream = fopen($url,'r');                  // until new is ready
    $tmpf = tempnam('/tmp','YWS');
    file_put_contents($tmpf, $stream);
    fclose($stream);
    rename($tmpf, $tmp);
  }
  return $tmp;
}

function yql($q, $fmt='xml') {
  $yql = "http://query.yahooapis.com/v1/public/yql?q=";
  $env = 'store://datatables.org/alltableswithkeys';
  $x = simplexml_load_file(cache($yql.urlencode($q)."&format=$fmt&env=".urlencode($env)));
  return $x;
}

function furl($p, $size='s', $ext='jpg') {
  return "http://farm{$p['farm']}.static.flickr.com/{$p['server']}/{$p['id']}_{$p['secret']}_{$size}.{$ext}";
}

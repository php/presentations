<?php
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" . 
              "Cookie: foo=bar\r\n"
  ),
  'file'=>array()
);

$context = stream_context_create($opts);
libxml_set_streams_context($context);

$d = domdocument::load('http://localhost/stream-example.xml');
print $d->saveXML();
?>
<?php
if(file_exists("/cache/first.cache")) {
  $stat = @stat("/cache/first.cache");

  // cache for 10 seconds
  if ($stat[9] && 
      (time() > $stat[9] + 10)) {
    unlink("/cache/first.cache");
  } else {
    include("/cache/first.cache");
    return;
  }
}

$cachefp = fopen("/cache/first.cache", "w");
ob_start();
?>
<html>
<body>
Today is <?= strftime("%A, %B %e %Y %H:%M:%S") ?> 
</body>
</html>
<?php
if ($cachefp) {
  $file = ob_get_contents();
  fwrite($cachefp, $file);
  ob_end_flush();
}
?>

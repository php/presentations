<?php
require_once "Cache_File.inc";
$cache = new Cache_File("second.cache", 10);
if($text = $cache->get()) {
	print $text;
	exit;
}
$cache->begin();
?>
<html>
<body>
<!-- Cacheable for a day -->
Today is <?=strftime("%A, %B %e %Y %H:%M:%S")?> 
</body>
</html>
<?php
$cache->end();
?>

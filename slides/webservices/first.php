<?php
$TEXT = <<<MB
 Be bloody, bold, and resolute; laugh to scorn
 The power of man, for none of woman born
 Shall harm Macbeth. 
MB;

$URL = 'http://landonize.it/index.php?' .
	   'filter=Landon&' . 
	   'how=text&' . 
	   'method=plain&' .
	   'text=' . urlencode(nl2br($TEXT));

echo file_get_contents($URL);
?>

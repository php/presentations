<pre>
<?php
	$path = dirname(__FILE__);
	$data = file_get_contents("{$path}/wddx_packet.xml");
	$result = wddx_deserialize($data);
	print_r($result);
?>
</pre>
<?php
// Our assoc array
$talk = array (
			'id' => 4,
			'title' => 'Dynamic Images in PHP - How and When to Use Them',
			'date' => '2002-04-29',
			'speaker' => 'Alison Gianotto',
			'url' => 'http://www.sdphp.net/talks/ag_image'
		);

// we can serialize the value and 
// create the packet in one step

$ser1 = wddx_serialize_vars('talk');

echo format_packet($ser1, 'In one step');

// or we could serialize it in several steps

$packet = wddx_packet_start("One of Alison's talks at SDPHP");
wddx_add_vars($packet, 'talk');
$ser2 = wddx_packet_end($packet);

echo format_packet($ser2, 'Making the packet by hand');

// now let's deserialize the packet

$vars = wddx_deserialize($ser2);
echo "<pre>\n<small>\n";
print_r($vars);
echo "</small>\n</pre>\n";

function format_packet($pckt, $title='wddx packet') {
	$re = '/^[^<]/';
	$pckt = str_replace('>', ">\n", $pckt);
	$t = explode("\n", $pckt);
	$s = "[ $title ]<br>\n<pre>\n";
	foreach ($t as $line) {
		if (trim($line) == '') {
			continue;
		} elseif (preg_match($re, $line)) {
			$tmp = explode("\n",str_replace('<', "\n<", $line));
			$s .= ' <span style="color: blue;">'.
					$tmp[0]."</span>\n".
					htmlspecialchars($tmp[1])."\n";
		} else {
			$s .= htmlspecialchars($line)."\n";
		}
	}
	$s .= "</pre>\n<hr>\n";
	return $s;
}

?>

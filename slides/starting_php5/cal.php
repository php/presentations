<?php
echo '<h5>Calendar For: '.date("F Y").'</h5>';

// get current date as array
$now = getdate(); 

// calculate the last day of this month
$end = 31;
while (!checkdate($now['mon'], $end, $now['year'])) --$end;

echo '<table border="1"><tr>
	<th><b>S</b></th>
	<th>M</th>
	<th>T</th>
	<th>W</th>
	<th>T</th>
	<th>F</th>
	<th><b>S</b></th>
</tr><tr>';

// determine day of the week for the 1st of the month
// and add the necessary padding
$now = getdate(mktime(0,0,0,$now['mon'], 1));
if ($now['wday'] > 0) { // not sunday
	echo str_repeat('<td> </td>', $now['wday']);
}

$s = 1;
while ($s < ($end + 1)) {
	$ts = getdate(mktime(0,0,0,$now['mon'], $s));
	if (!$ts['wday']) { // if Sunday start new row
		echo '</tr><tr>';
	}
	echo '<td align="right">'.$s.'</td>';
	
	$s++;
}
echo '</tr></table>';
?>
<?php
$linfo = localeconv();

function locale_num ($n) 
{
	global $linfo;

	return number_format($n, 
						 $linfo['decimal_point'], 
						 $linfo['thousands_sep']);
}

print locale_num(100);
print locale_num(200203002);
print locale_num(139939.23321);
?>

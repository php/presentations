<?php

function &rpc_call(&$client, &$msg) {
	$r=$client->send($msg);
	if (!$r) {
		print "<PRE>ERROR: couldn't send message</PRE>\n";
		return 0;
	} else {
		if (!$r->faultCode()) {
			return $r->value();
		} else {
			print "Fault: ";
			print "Code: " . $r->faultCode() . 
				" Reason '" .$r->faultString()."'<BR>";
			return 0;
		}
	}
}

function toTable($arr) {
	$fields = array_keys($arr[0]);
	$nfields = count($fields);
	$out = "<table border=1>\n<tr align='center'>\n";
	for ($i=0; $i<$nfields; $i++) {
		$out .= "<th>".$fields[$i]."</th>\n";
	}
	$out .= "</tr>\n";
	$ndata = count($arr);
	for ($i=0; $i<$ndata; $i++) {
		$out .= "<tr align='center'>\n";
		while(list($f,$val) = each($arr[$i])) {
			$out .= "<td>&nbsp;".htmlspecialchars($val)."</td>\n";
		}
		$out .= "</tr>\n";
	}
	$out .= "</table>\n";
	return $out;
}

function toTable2($arr) {
	$fields = array_keys($arr[0]);
	$nfields = count($fields);
	$ndata = count($arr);
	$out = "<table border=1>\n";
	for ($i=0; $i<$ndata; $i++) {
		$out .= "<tr align='center'>\n<th colspan='2'>ROW: ".($i + 1)."</th>\n</tr>\n";
		for ($j=0; $j<$nfields; $j++) {
			$out .= "<tr>\n<th align='center'>".$fields[$j]."</th>\n";
			$out .= "<td>".htmlspecialchars($arr[$i][$fields[$j]])."</td>\n</tr>\n";
		}
	}
	$out .= "</table>\n";
	return $out;
}

?>

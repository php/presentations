<?php
$api = array (
			"sql" => "api/function.sqlquery.php",
			"metallopdb" => "api/function.getpdbfrommetal.php",
			"get" => "api/function.getfile.php"
		);

$sqldoc = 'General function to query a database server.
Accepts a valid SQL query ("SELECT", "SHOW", or "DESCRIBE" statements only),
and an optioanl result format. Valid formats are "csv" (default),
"wddx", "serialized" (PHP serialization), "table" (HTML table).
Example of use: '.$_SERVER['PHP_SELF'].
'?function=sql&query=select+source_id+from+protein+limit+10&format=wddx';

$metallopdbdoc= 'Specialized function to retrieve a list of PDB structures
containing a particular metal ion, as indexed in the MDB. The retrieval
mode can be one of "first" (default) to get the first "n" PDB ids (sorted
alphabetically), "last" to get the last "n" ids, "random" to get "n"
random entries, and "new" to ge the newest "n" entries released/indexed.
The number of entries to retrieve is set using "count".
The list can be formated as "csv" (default), "wddx", "rss", or "serialized"
(PHP serialization).
Example of use: '.$_SERVER['PHP_SELF'].
'?function=metallopdb&metal=zn&mode=random&count=5&format=rss';


$getdoc = 'Returns the requested file. It accepts 2 parameters: 
the name of the file, and (optionally) the format. Valid formats
are "raw" (default), "base64", and "gzip". Example of use:
'.$PHP_SELF.'?function=get&file=1hca_s1.pdb&format=base64';


$apidoc = array (
			"sql" => $sqldoc,
			"metallopdb" => $metallopdbdoc,
			"get" => $getdoc
			);

$apiparams = array (
			"sql" => array(
						"query" => "urlencoded SQL query",
						"[format]" => "csv (default), wddx, serialized, table"
						),
			"metallopdb" => array (
						"metal" => "atomic symbol for the metal",
						"[mode]" => "one of: first (default), last, random, new",
						"[count]" => "how many PDB entries to retrieve (default = 5)",
						"[format]" => "csv (default), wddx, rss, serialized"
						),
			"get" => array(
						"file" => "name of file to download",
						"[format]" => "raw (default), base64, gzip"
						)
			);
?>

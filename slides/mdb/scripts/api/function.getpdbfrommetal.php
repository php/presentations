<?php
require_once "globals.inc";
require_once "DB.php";

/**
 * Function to retrieve a list of PDB ids
 *
 * @param	string	$metal	metal symbol
 * @param	string	$mode	one of: first, last, random, new
 * @param	int		$count	number of entries to retrieve
 * @return	mixed	array of results on sucess, false or a DB_Error otherwise
 */

function &getPDBFromMetal($metal, $mode, $count) {
	$fields = "distinct site.metal, protein.source_id, ";
	$fields .= "DATE_FORMAT(protein.rev_date, '%Y/%m/%d') as revision_date,"; 
	$fields .= "DATE_FORMAT(protein.dep_date, '%Y/%m/%d') as deposition_date,"; 
	$fields .= "protein.expdata, protein.r_value, protein.resolution,";
	$fields .= "protein.authors, protein.description";
	$from = "from site,protein";
	$where = "where site.metal = '$metal' and site.source_id = protein.source_id";
	switch ($mode) {
		case "last" :
			$ordlim = " order by protein.source_id DESC limit $count";
			break;
		case "new" :
			$ordlim = " order by protein.rev_date DESC limit $count";
			break;
		case "random" :
			$ordlim = "";
			break;
		case "first" :
		default:
			$ordlim = " order by protein.source_id ASC limit $count";
			break;
	}
	$query = "select $fields $from $where $ordlim";
	$c = @DB::connect(MDB_DATA_DSN);
	if (is_object($c) && !DB::isError($c)) {
		$c->setFetchMode(DB_FETCHMODE_ASSOC);
		$result = $c->getAll($query);
		$c->disconnect();
		if (!is_array($result))
			return false;
		if ($mode == "random") {
			$n = count($result);
			list($usec, $sec) = explode(' ', microtime());
			srand((float) $sec + ((float) $usec * 100000));
			$indexlist = array_rand(range(0, $n - 1), $count);
			$randomresult = array();
			foreach ($indexlist as $index)
				$randomresult[] = $result[$index];
			return $randomresult;
		} else {
			return $result;
		}
	} else {
		return new DB_Error("Error while accessing database -- ".$c->getMessage());
	}
}

?>

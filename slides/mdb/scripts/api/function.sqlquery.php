<?php
require_once "DB.php";


/**
 * Function to perform SQL queries
 *
 * @param	string	$q
 * @return	array	of results
 */

function &sqlquery($dsn, $query, $return_DB_Result=false) {
	$c = @DB::connect($dsn);
	if (is_object($c) && !DB::isError($c)) {
		$c->setFetchMode(DB_FETCHMODE_ASSOC);
		if ($return_DB_Result == true) {
			$result = $c->query($query);
		} else {
			$result = $c->getAll($query);
			if (!is_array($result))
				$result = array();
		}
		$c->disconnect();
		return $result;
	} else {
		return new DB_Error("Error while accessing database -- ".$c->getMessage());
	}
}
?>

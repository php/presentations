<?php
require_once 'globals.inc';
require_once 'api/api_functions.php';

if (isset($func) && !empty($func)) {

	if (!in_array($func, array_keys($api))) {
		echo "Unknown function";
		exit;
	}

	// include the appropriate function
	require_once "{$api[$func]}";
	require_once "api/util_convert.php";

	// SQL query wrapper function
	function sql() {/*{{{*/
		if (!$_REQUEST['query']) {
			echo "<b>ERROR: Missing parameters.</b>\n";
			return false;
		}
		// allow only SELECT, SHOW or DESCRIBE queries
		$allowed = "^(select|show|describe)";
		if (!eregi($allowed, trim($_REQUEST['query']))) {
			echo "<b>ERROR: Only 'SELECT', 'SHOW', or 'DESCRIBE' queries are allowed.</b>\n";
			return false;
		}
		$result = sqlquery(MDB_DATA_DSN, $_REQUEST['query']);
		if (is_object($result) && DB::isError($result)) {
			echo "<b>ERROR ".$result->getCode().": ".$result->getMessage()."</b>\n";
			return false;
		}
		$format = isset($_REQUEST['format']) ? strtolower($_REQUEST['format']) : "csv";
		switch ($format) {
			case "wddx" :
				$out = wddx_serialize_value($result);
				break;
			case "serialize" :
				$out = serialize($result);
				break;
			case "table" :
				$out = toTable($result);
				break;
			case "csv" :
			default :
				$fields = array_keys($result[0]);
				$out = toCSV($fields);
				for ($i=0; $i < count($result); $i++) {
					$out .= toCSV(array_values($result[$i]));
				}
				break;
		}
		echo $out;
		return true;
	}/*}}}*/
	
	// wrapper function to get PDB ids for a given metal
	function metallopdb() {/*{{{*/
		if (!$_REQUEST['metal']) {
			echo "<b>ERROR: Missing parameters.</b>\n";
			return false;
		}
		$metal = strtolower($_REQUEST['metal']);
		$mode = isset($_REQUEST['mode']) ? strtolower($_REQUEST['mode']) : 'first';
		$count = isset($_REQUEST['count']) ? intval($_REQUEST['count']) : 5;
		$format = isset($_REQUEST['format']) ? strtolower($_REQUEST['format']) : 'csv';

		$result = getPDBFromMetal($metal, $mode, $count);
		if (is_object($result) && DB::isError($result)) {
			echo "<b>ERROR ".$result->getCode().": ".$result->getMessage()."</b>\n";
			return false;
		}
		if ($result == false) {
			echo "";
			return false;
		}
		switch ($format) {
			case "wddx" :
				header("Content-type: text/xml");
				echo wddx_serialize_value($result);
				break;
			case "serialize" :
				header("Content-type: text/plain");
				echo serialize($result);
				break;
			case "rss" :
				header("Content-type: text/xml");
				echo toRSS($result,$GLOBALS['server_remote']);
				break;
			case "csv" :
			default :
				header("Content-type: text/plain");
				$fields = array_keys($result[0]);
				$out = toCSV($fields);
				for ($i=0; $i < count($result); $i++) {
					$out .= toCSV(array_values($result[$i]));
				}
				echo $out;
				break;
		}
		return true;

	}/*}}}*/

	// execute the api wrapper function
	$output = $func();

} else {
	// show introspection

	require_once "general.lib";
	function get_content_ts() {/*{{{*/
		return -1;
	}/*}}}*/

	function get_content() {/*{{{*/
		$content = lib_content("__default");
		$content['name'] = $_SERVER['PHP_SELF'];
		$content['title'] = 'MDB - Web API (introspection)';
		$content['page_title'] = 'MDB - Web API (introspection)';
		$apidesc = "<div align='center'>\n";
		$apidesc .= "<table width='90%' border='0' cellpadding='5'>\n";
		foreach ($GLOBALS['apidoc'] as $func=>$doc) {
			if ($func == "get")
				continue;
			$apidesc .= "<tr><td>\n";
			$apidesc .= "<table border='0' width='100%' cellpadding='0' cellspacing='0'>\n";
			$apidesc .= "<tr><td bgcolor='#000000'>\n";
			$apidesc .= "<table border='0' width='100%' cellspacing='1' cellpadding='5'>\n";
			$apidesc .= "<tr bgcolor='#eeeeee'>\n";
			$apidesc .= "<th align='center'><i>Function</i>:<br /> $func</th>\n";
			$apidesc .= "<th align='left'>\n<i>Parameters</i>:<ul>\n";
			foreach ($GLOBALS['apiparams'][$func] as $param=>$desc)
				$apidesc .= "<li>$param: $desc</li>\n";
			$apidesc .= "</ul>\n</th>\n";
			$apidesc .= "</tr>\n<tr bgcolor='#ddffff'>\n<td colspan='2'>";
			$apidesc .= "<p><b>Description:</b><br />";
			$apidesc .= htmlspecialchars($doc)."</p>\n</td>\n</tr>\n";
			$apidesc .= "</table>\n</td></tr></table>\n</td></tr>\n";
		}
		$apidesc .= "</table></div>\n";
		$content['body'] = $apidesc;
		$content['timestamp'] = -1;
		$content['page_img'] = 'MDB Web API:/images/api.png:/services/api/index.php';
		return $content; 
	}/*}}}*/

	require_once "dochandler.lib";

}
?>

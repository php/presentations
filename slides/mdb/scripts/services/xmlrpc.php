<?php
if (!isset($HTTP_RAW_POST_DATA)) {
	die('invalid XML-RPC request');
}

require_once 'globals.inc';
require_once "XML/RPC/Server.php";
require_once "api/xmlrpc_util.php";
require_once "api/xmlrpc_methods.php";
require_once 'api/util_convert.php';

$s = new XML_RPC_Server($methods);

// define server methods

// handles method.sql
function sql ($m) {/*{{{*/
	require_once 'api/function.sqlquery.php';
	if ($m->getNumParams() > 1) {
        $error = "Invalid number of parameters. SQL query required";
        return new XML_RPC_Response (0,$GLOBALS['XML_RPC_erruser'],$error);
	}

    $db = $GLOBALS['dsn'].$GLOBALS['datadb'];
    // get the SQL statement
    $query = $m->getParam(0);
    // return an error if the query is not allowed
    if (!ereg("^(select|show|describe) ",strtolower($query->scalarval()))) {
        $error = 'Invalid query, only "SELECT", "SHOW", or "DESCRIBE" statements are accepted';
        return new XML_RPC_Response (0,$GLOBALS['XML_RPC_erruser'],$error);
    }
	// perform the query
    $result = @sqlquery($db, $query->scalarval(), true);
	if (is_object($result) && DB::isError($result)) {
		$error = $result->getCode().": ".$result->getMessage();
        return new XML_RPC_Response (0,$GLOBALS['XML_RPC_erruser'],$error);
    }
	$res = db2XMLRPC($result); 
    return new XML_RPC_Response($res);
}/*}}}*/

// handles method.get
function get($m) {/*{{{*/
	require_once 'api/function.getfile.php';
	$param0 = $m->getParam(0);
	$file = $param0->scalarval();

	if ($m->getNumParams() == 2) {
		$param1 = $m->getParam(1);
		$format = $param1->scalarval();
	}
	
	if ($format != "raw" && $format != "gzip")
		$format = "raw";

	$data = getfile($file, $format);

	if (!$data || empty($data)) {
		$error = "Could not read file: $file, in format: $format";
        return new XML_RPC_Response (0,$GLOBALS['XML_RPC_erruser'],$error);
	}
	
	return new XML_RPC_Response( new XML_RPC_Value($data, $GLOBALS['XML_RPC_Base64']) );
}/*}}}*/

// handles method.metallopdb
function metallopdb($m) {/*{{{*/
	require_once 'api/function.getpdbfrommetal.php';
	require_once 'api/util_convert.php';
	if ($m->getNumParams() == 0 || $m->getNumParams() > 4) {
        $error = "Invalid number of parameters: metal, [mode], [count], [format]";
        return new XML_RPC_Response (0,$GLOBALS['XML_RPC_erruser'],$error);
	}
	// get the metal
	$metal = $m->getParam(0);
	$mode = ($m->getNumParams() > 1) ? $m->getParam(1) : new XML_RPC_Value("first");
	$count = ($m->getNumParams() > 2) ? $m->getParam(2) 
					: new XML_RPC_Value(5, $GLOBALS['XML_RPC_Int']);
	$format = ($m->getNumParams() > 3) ? $m->getParam(3) : new XML_RPC_Value("array");
	$result = getPDBFromMetal($metal->scalarval(), $mode->scalarval(),
								intval($count->scalarval()));
	if (is_object($result) &&  DB::isError($result)) {
		echo "<b>ERROR ".$result->getCode().": ".$result->getMessage()."</b>\n";
		return false;
	}
	if ($result == false) {
		echo "";
		return false;
	}
	switch ($format->scalarval()) {
		case "rss" :
			$packet = new XML_RPC_Value(toRSS($result), $GLOBALS['XML_RPC_Base64']);
			break;
		case "wddx" :
			$packet = new XML_RPC_Value(wddx_serialize_value($result),
									$GLOBALS['XML_RPC_Base64']);
			break;
		case "array" :
		default:
			$types = array (
					'metal' => $GLOBALS['XML_RPC_String'],
					'source_id' => $GLOBALS['XML_RPC_String'],
					'revision_date' => $GLOBALS['XML_RPC_DateTime'],
					'deposition_date' => $GLOBALS['XML_RPC_DateTime'],
					'expdata' => $GLOBALS['XML_RPC_String'],
					'r_value' => $GLOBALS['XML_RPC_Double'],
					'resolution' => $GLOBALS['XML_RPC_Double'],
					'authors' => $GLOBALS['XML_RPC_String'],
					'description' => $GLOBALS['XML_RPC_String']
				);
			$packet = array2XMLRPC($result, $types);
			break;
	}
	return new XML_RPC_Response($packet);
}/*}}}*/

?>

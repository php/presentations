<?php // new approach to PUT
function PUT(&$params) {
	$fspath = $this->base . $params["path"];
	
	if(!@is_dir(dirname($fspath))) {
		return false;
	}
	
	$options["new"] = ! file_exists($fspath);
	
	$fp = fopen($fspath, "w");
	
	return $fp;
}
?>
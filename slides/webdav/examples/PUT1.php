<?php 
function PUT(&$params) {
	$fspath = $this->base . $params["path"];
	
	if(!@is_dir(dirname($fspath))) {
		return "409 Conflict";
	}
	
	$new = ! file_exists($fspath);
	
	$fp = fopen($fspath, "w");
	if(is_resource($fp) 
     && is_resource($params["stream"])) {
		while(!feof($params["stream"])) {
      fwrite($fp, fread($params["stream"], 4096));
    }
		fclose($fp);
	}
	
	return $new ? "201 Created" : "204 No Content";
}
?>
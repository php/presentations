<?php
  function GET(&$param) 
  {
	  $fspath = $this->base . $param["path"];
	  
	  if (file_exists($fspath)) {             
		  $param['mimetype'] = mime_content_type($fspath); 
		  $param['mtime']    = filemtime($fspath);
		  $param['size']     = filesize($fspath);
		  $param['stream']   = fopen($fspath, "r");
		  
		  return true;
	  } else {
		  return false;
	  }               
  }
?>
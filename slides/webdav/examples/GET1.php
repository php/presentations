<?php
  function GET(&$param) {
    $fspath = $this->base . $param["path"];

    if (file_exists($fspath)) {       
      header("Content-Type: "  . mime_content_type($fspath); 
      header("Last-Modified: " . date("D, j M Y H:m:s ", file_mtime($fspath)) . "GMT");
      header("Content-Length: ". filesize($fspath));

      readfile($fspath);
      return true;
    } else {
      return false;
    }       
  }
?>
<?php
class Cache_File {
  var $filename;
  var $tempfilename;
  var $expriration;
  var $fp;
  var $cachedir = '/cache';

  function Cache_File($file, $exp=false) {
    $this->filename = $file;
    $this->expiration = $exp;
  }

  function getLoc() {
	return "{$this->cachedir}/{$this->filename}";
  }
	
  function begin() {
    $this->tempfilename = $this->cachedir . '/' . 
	                      $this->filename . '.' .  
	                      getmypid();
    
	$this->fp = fopen($this->tempfilename, "w");
	if ($this->fp === false) {
      return false;
    }
    ob_start();
  }
  function end() {
    $buffer = ob_get_contents();
    ob_end_flush();
    if(strlen($buffer)) {
      fwrite($this->fp, $buffer);
      fclose($this->fp);
      rename($this->tempfilename, $this->getLoc());
      return true;
    }
    else {
      fclose($this->fp);
      unlink($this->tempfilename);
      return false;
    }
  }
  function put($buffer) {
    $this->fp = fopen($this->tempfilename, "w");
	if ($this->fp === false) {
      return false;
    }
    fwrite($this->fp, $buffer);
    fclose($this->fp);
    rename($this->tempfilename, $this->getLoc());
    return true;
  }
  function get() {
    $filename = $this->getLoc();
    if($this->expiration) {
      $stat = @stat($filename);
      if($stat[9]) {
        if(time() > $stat[9] + $this->expiration) {
          unlink($filename);
          return false;
        }
      }
    }
    return @file_get_contents($filename);
  }
}
?>

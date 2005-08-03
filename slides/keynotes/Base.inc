<?php
abstract class Base {
  public function __toString() {
    return '<pre>'.print_r($this,TRUE).'</pre>';
  }
}
?>

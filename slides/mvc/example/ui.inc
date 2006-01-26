<?php
function head($title="Default") {
  echo <<<EOB
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
 <head>
  <title>$title</title>
  <style type="text/css" media="screen">@import "styles.php";</style>
  <script language="javascript" type="text/javascript" src="lib.js"></script>
  <script language="javascript" type="text/javascript" src="common.js"></script>
 </head>
 <body>
  <div class="main">

EOB;
}

function foot() {
  echo <<<EOB
  </div><br clear="left"/>
  <div id="debug" class="debug">
  </div>
 </body>
</html>
EOB;
}

function field($title,$name,$type,$entry,$extra=null) {
  $fill  = !empty($entry[$name]) ? $entry[$name] : $title;
  $float = !empty($extra['float']) ? "style=\"float:{$extra['float']};\"" : '';

  switch($type) {
    case 'text':
      $size  = isset($extra['size'])  ? $extra['size']  : 64;
      $maxl  = isset($extra['maxl'])  ? $extra['maxl']  : 128;
      $dir   = isset($extra['dir'])   ? $extra['dir']   : 'LTR';
      
      echo <<<EOB
<input type="hidden" name="desc_$name" id="desc_$name" value="$title" />
    <input type="text" $readonly class="f" id="f_$name" name="$name" size="$size"
         maxlength="$maxl" value="$fill" dir="$dir" $float
         onfocus="if(document.all) { addClass(this,'iefocus') } 
                  if (this.value == '$title') { this.value = '' }"
         onblur ="if(document.all) { delClass(this,'iefocus') }
                  if (this.value == '') { this.value = '$title' }" />
EOB;
      break;

    case 'select':
      $size = isset($extra['size']) ? $extra['size'] : 1;
      echo <<<EOB
<input type="hidden" name="desc_$name" id="desc_$name" value="$title" />
    <select class="f" name="$name" id="f_$name" size="$size">
     <option selected>$title</option>

EOB;
      foreach($extra['options'] as $k=>$v) {
        if(isset($extra['options_field'])) $v = $v[$extra['options_field']];
        if($v==$fill) echo "     <option selected value=\"$v\">$v</option>\n";
        else echo "     <option value=\"$v\">$v</option>\n";
      }
      echo "    </select>";
      break;

    case 'textarea':
      $cols = isset($extra['cols']) ? $extra['cols'] : 63;
      $rows = isset($extra['rows']) ? $extra['rows'] : 5;
      $wrap = isset($extra['wrap']) ? $extra['wrap'] : 'soft';
      echo <<<EOB
<input type="hidden" name="desc_$name" id="desc_$name" value="$title" />
    <textarea
         name="$name" class="f" id="f_$name" cols="$cols"
         rows="$rows" wrap="$wrap" $float
         onfocus="if(document.all) { addClass(this,'iefocus') } 
                  if (this.value == '$title') { this.value = '' }"
         onblur ="if(document.all) { delClass(this,'iefocus') } 
                  if (this.value == '') { this.value = '$title' }">$fill</textarea>
EOB;
      break; 
  }
  echo "\n";
}

?>

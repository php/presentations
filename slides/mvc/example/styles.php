<?php 
  header("Content-type: text/css");
  $ua = $_SERVER['HTTP_USER_AGENT'];
  if(strstr($ua,'Safari')) $safari = true;
  else if(strstr($ua,'IE')) $ie = true;
?>
.main {
 padding: 10px 10px 10px 10px;
 margin-right: auto;
 margin-left: auto;
 width: 34em;
 text-align: left;
 vertical-align: top;
 background: #448;
 border: 1px #ccc solid;
 -moz-border-radius: 10px;
}

.f {
 padding-left: 5px;
 border-bottom: 1px #000 solid;
 border-right: 1px #000 solid;
 border-left: 1px #202 solid;
 border-top: 1px #202 solid;
}

.ta {
  width: 100%;
  height: 200px;
  overflow: auto;
  border: 2px solid white;
  background: #eef;
}

.it0 {
 background: #eef;
 padding: 5px;
}
.it1 {
 background: #ccd;
 padding: 5px;
}
.its {
 background: #f34;
 padding: 5px;
}

.status {
  position: absolute;
  margin-left: 50px;
  color: #f23;
  font-size: 8em;
}

body { margin: 20px; font-size: 1.5em; text-align: center; background: #fff; }

select:focus, input:focus, textarea:focus, 
select.iefocus, input.iefocus, textarea.iefocus {
 background: #ddf;
}

select, input {
 background: #aaf;
 font-size: 0.8em;
}

textarea {
 background: #aaf;
<?php if($safari) { ?>
 font-size: 0.8em;
<?php } else { ?>
 font-size: 1.05em;
<?php } ?>
}


.error {
  position: absolute;
  background: #f22;
}
.debug {
  float: left;
  text-align: left;
  margin: 10px;
  width: 100%;
  border-top: 5px solid black;
}

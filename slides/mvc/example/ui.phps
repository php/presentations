<?php
function head($title="Default") { ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
 <head>
  <title><?php echo $title?></title>
  <style type="text/css" media="screen">@import "styles.css";</style>
  <script language="javascript" type="text/javascript" src="/yui/YAHOO.js"></script>
  <script language="javascript" type="text/javascript" src="/yui/dom.js"></script>
  <script language="javascript" type="text/javascript" src="/yui/event.js"></script>
  <script language="javascript" type="text/javascript" src="/yui/connection.js"></script>
  <script language="javascript" type="text/javascript" src="/yui/animation.js"></script>
  <script language="javascript" type="text/javascript" src="common.js"></script>
 </head>
 <body>
  <br />
  <div class="main">
<?php
}

function foot() { ?>
  </div><br clear="left"/>
  <font size="-1">Server -&gt; Client JSON Messages</font><br />
  <div id="debug" class="debug">
  </div>
  <script>fancyItems(); fancyForm();</script>
 </body>
</html>
<?php
}
?>

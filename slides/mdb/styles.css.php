<style title="Default" type="text/css">
body {
	font-size: 12pt;
	margin-left:1.5em;
	margin-right:0em;
	margin-bottom:0em;
}
div.sticky {
	margin: 0;
<?if(strstr($HTTP_USER_AGENT,'MSIE')): // Need a much smarter check here ?>
	position: absolute;
<?else:?>
	position: fixed;
<?endif?>
	top: 0em;
	left: 0em;
	right: auto;
	bottom: auto;
	width: auto;
}
div.shadow {
	background: #777777;
	padding: 0.5em;
}
div.navbar {
	background: #0000ff;
	padding: 4;
	margin: 0;
	height: 6em;
	color: #ffffff;
	font-family: verdana, tahoma, arial, helvetica, sans-serif;
}
div.emcode {
	background: #cccccc;
	border: thin solid #000000;
	padding: 0.5em;
	font-family: monospace;
}
div.output {
	font-family: monospace;
	background: #cccc55;
	border: thin solid #000000;
	padding: 0.5em;
}
h1X {
	font-size: 2em;
}
pX,liX {
	font-size: 12pt;
}
a {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
</style>

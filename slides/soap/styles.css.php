<style title="Default" type="text/css">
body {
	font-size: 8pt;
	margin-left:1.5em;
	margin-right:0em;
	margin-bottom:0em;
	background: #EFECDD;
	background-image: url(slides/soap/activestate_background.jpg);
	background-attachment : fixed;
        background-repeat : no-repeat;
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
	background: #A68C53;
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
h1 {
	font-size: 2em;
}
p,li {
	font-size: 2.6em;
}
a {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
</style>
<?
global $names;
$names = array("betty", "johnny", "sue");

function dispnames() {
	global $names;
    foreach ($names as $name) {
        print "<td>$name</td>";
    }
}


function commonHeader($title) {
?>
<html>
<head>
<title><?=$title?></title>
</head>
<body bgcolor="#ffffff">
<?
}

function commonFooter() {
    print "</body></html>";
}
?>

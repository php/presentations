<?
function dispnames() {
    $names = array("betty", "johnny", "sue");

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

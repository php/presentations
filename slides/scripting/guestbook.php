<?php
/* check var: check gpc variables */
function check_var ($varname)
{
    if (!isset ($_REQUEST[$varname])) {
        die ("You must submit the $varname field\n");
    }
}

/* Global variables */
$txtfldsize = 42;

/* Initialize mysql connection */
mysql_pconnect ("localhost", "sterling", "pres") or
    die ("Cannot connect to database: " . mysql_error() . "\n");

mysql_select_db ("pres") or 
    die ("Cannot select database: " .mysql_error() . "\n");
?>
<html>
<head>
<title>Welcome to my Guestbook</title>
</head>
<body>
<h1>Welcome to My Guestbook</h1>
<hr>
<? if (!$submitted) { ?>
<h2>Please Sign Your entry</h2>
<form method=post action=<?=$PHP_SELF?>>
<table border="0" cellpadding="1">
<tr>
<td>Name:</td>
<td><input type=text name=fullname size=<?=$txtfldsize?>></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input type=text name=email size=<?=$txtfldsize?>></td>
</tr>
<tr>
<td valign=top>Message (<i>No HTML</i>):</td>
<td><textarea rows=10 cols=40 name=msg></textarea></td>
</tr>
<tr>
<td colspan=2>
<input type=hidden name=submitted value=1>
<input type=submit value="Add Entry">
</td>
</tr>
</table>
<form>
<? 
} else {
    check_var ('fullname');
    check_var ('msg');
    check_var ('email');

    $res = mysql_query ("insert into guestbook (name, email, msg, remote_host) values " .
                        "('" . addslashes ($_REQUEST['fullname']) . "', '" .
                        addslashes ($_REQUEST['email']) . "', '" .
                        addslashes (htmlspecialchars ($_REQUEST['msg'])) . "', '" . 
                        addslashes ($_SERVER['REMOTE_ADDR']) . "') ");

    if ($res === false) {
        die ("Cannot insert entry into guestbook: " . mysql_error() . "\n");
    }

    print "<b>Entry successfully added</b>\n";
} ?>
<hr>
<? /* Display entries */
$qh = mysql_query ("select name, email, msg from guestbook order by entry_id desc");
if ($qh === false) {
    die ("Cannot select entries from guestbook: " . mysql_error() . "\n");
}

function disprow ($id, $val) {
    $id = stripslashes ($id);
    $val = stripslashes ($val);

    print "<tr>\n";
    print "<td width=20%><b>$id</b>:</td>\n";
    print "<td>$val</td>\n";
    print "</tr>\n";
    print "<tr><td colspan=2></tr>\n";
}

print "<table border=1 cellpadding=1 width=75%>\n";
while ($row = mysql_fetch_array($qh, MYSQL_ASSOC)) {
    disprow ('Name', $row['name']);
    disprow ('Email', $row['email']);
    disprow ('Message', $row['msg']);
}
print "</table>";
?>
</body>
</html>

<?php

$token = md5(time());
$fp = fopen('./tokens.txt', 'a');
fwrite($fp, "$token\n");
fclose($fp);

?>

<form method="post"
action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="hidden" name="token"
value="<?php echo $token; ?>" />
<input type="text" name="message"><br />
<input type="submit">
</form>

<?php

$tokens = file('./tokens.txt');

if (isset($_POST['message']))
{
	if (in_array("{$_POST['token']}\n",
	$tokens))
	{
		$message =
		htmlentities($_POST['message']);
		$fp = fopen('./safer.txt', 'a');
		fwrite($fp, "$message<br />");
		fclose($fp);
	}
}

readfile('./safer.txt');

?>

<?
$secret = uniqid(time());
$fp = fopen('./secrets.txt', 'a');
fwrite($fp, "$secret\n");
fclose($fp);
?>
<form action="<? echo $PHP_SELF; ?>">
<input type="text" name="message">
<input type="hidden" name="secret" value="<? echo $secret; ?>">
<input type="submit">
</form>
<?
if (!empty($_GET['message']))
{
	$secrets = file('./secrets.txt');
	$user_secret = "{$_GET['secret']}\n";
	if (in_array($user_secret, $secrets))
	{
		$fp = fopen('./safer.txt', 'a');
		$msg = $_GET['message'];
		$msg = htmlentities($msg);
		fwrite($fp, "$msg<br>");
		fclose($fp);
	}
}
readfile('./safer.txt');
?>

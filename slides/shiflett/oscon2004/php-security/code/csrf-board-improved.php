<?php

session_start();

if (isset($_POST['message']))
{
	if ($_POST['token'] ==
	$_SESSION['token'])
	{
		$message =
		htmlentities($_POST['message']);
		$fp = fopen('./safer.txt', 'a');
		fwrite($fp, "$message<br />");
		fclose($fp);
	}
}

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

?>

<form method="post"
action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="hidden" name="token"
value="<?php echo $token; ?>" />
<input type="text" name="message"><br />
<input type="submit">
</form>

<?php readfile('./safer.txt'); ?>

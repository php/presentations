<form
action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="message"><br />
<input type="submit">
</form>

<?php

if (isset($_GET['message']))
{
	$message =
	htmlentities($_GET['message']);

	$fp = fopen('./safer.txt', 'a');
	fwrite($fp, "$message<br />");
	fclose($fp);
}

readfile('./safer.txt');

?>

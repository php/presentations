<form
action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="message"><br />
<input type="submit">
</form>

<?php

if (isset($_GET['message']))
{
	$fp = fopen('./messages.txt', 'a');
	fwrite($fp, "{$_GET['message']}<br />");
	fclose($fp);
}

readfile('./messages.txt');

?>

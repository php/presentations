<html>
<body bgcolor="white">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
Login: <input type="text" name="login"><br />
Password: <input type="password" name="password"><br />
<input type="submit" value="Login">
</form>
<?php
	define('__SERVER__', "localhost");
	define('__PORT__', 80);

	if (count($_GET)) {
		include "/home/rei/www/pres2/presentations/slides/web_services/client.inc.php";
	
		$ret = make_request();
		if (parse_response($ret) === TRUE) {
			echo "Login Successful";
		} else {
			echo "Authentication Failure";
		}
	}	
?>
</body>
</html>

<?
echo "<pre>\n";

if (ini_get('safe_mode'))
{
	echo "[safe_mode enabled]\n\n";
}
else
{
	echo "[safe_mode disabled]\n\n";
}

if (isset($_GET['dir']))
{
	ls($_GET['dir']);
}
elseif (isset($_GET['file']))
{
	cat($_GET['file']);
}
else
{
	ls('/');
}

echo "</pre>\n";

function ls($dir)
{
	$handle = dir($dir);
	while ($filename = $handle->read())
	{
		$size = filesize("$dir$filename");

		if (is_dir("$dir$filename"))
		{
			if (is_readable("$dir$filename"))
			{
				$line = str_pad($size, 15);
				$line .= "<a href=\"{$_SERVER['PHP_SELF']}?dir=$dir$filename/\">$filename/</a>";
			}
			else
			{
				$line = str_pad($size, 15);
				$line .= "$filename/";
			}
		}
		else
		{
			if (is_readable("$dir$filename"))
			{
				$line = str_pad($size, 15);
				$line .= "<a href=\"{$_SERVER['PHP_SELF']}?file=$dir$filename\">$filename</a>";
			}
			else
			{
				$line = str_pad($size, 15);
				$line .= $filename;
			}
		}

		echo "$line\n";
	}
	$handle->close();
}

function cat($file)
{
	ob_start();
	readfile($file);
	$contents = ob_get_contents();
	ob_clean();
	echo htmlentities($contents);
}
?>


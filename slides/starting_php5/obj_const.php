<?php
class foo {
	const file_name = __FILE__;
}

echo foo::file_name; // will print current file name
?>
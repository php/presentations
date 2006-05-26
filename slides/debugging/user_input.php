	// hack me please
	include "template/" . $_GET['page'] . ".php";

	// apperances can be decieving, "32312\0Yay, H4x0r3d!"
	if (intval($_GET['id'])) {
		$result = mysql_query("SELECT * FROM foo WHERE bar=".$_GET['id']);
	}

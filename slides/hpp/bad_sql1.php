<?php 
/* CREATE TABLE entries (
  id int not null auto_increment,
  title varchar(128),
  topic varhcar(128),
  body text,
  primary key(id)
); */

function entries_between($begin, $end) {
	mysql_query("SELECT * from entries");
	while ($array = mysql_fetch_assoc()) {
		if ($array['id'] < $begin || 
		    $array['id'] > $end) {
			continue;
		}
		$retval[] = $array;
	}

	return $retval;
}

?>

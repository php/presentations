<?php
/* CREATE TABLE users (
  userid int not null auto_increment,
  name varchar(128),
  primary key(userid)
);

CREATE TABLE attributes (
  userid int not null,
  key   varchar(128),
  value varchar(128)
);
*/

function get_user($userid) {
	mysql_query("SELECT name FROM users 
	             WHERE userid = $userid");

	$userid->name = mysql_fetch();

	mysql_query("SELECT key, value 
	             FROM attributes a
		         WHERE userid = $userid");

	while(list($key, $value) = mysql_fetch()) {
			$userinfo[$key] = $value;
	}

	return $userinfo;
}
?>


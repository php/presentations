<?php
/* CREATE TABLE users (
  userid int not null auto_increment,
  name varchar(128),
  attr1 varchar(128),
  attr2 varchar(128),
  attr3 varchar(128),
  attr4 varchar(128),
  primary key(userid)
);

CREATE TABLE attributes (
  userid int not null,
  key   varchar(128),
  value varchar(128)
);
*/

function get_user($userid) {
	mysql_query("SELECT * FROM users 
	             WHERE userid = $userid");
	$row = mysql_fetch_assoc();
	foreach ($row as $key => $value) {
		$userinfo[$key] = $value;
	}
}
?>


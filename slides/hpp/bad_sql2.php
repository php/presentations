<?php
/* CREATE TABLE entries (
  entryid int not null auto_increment,
  title varchar(128),
  authorid int,
  topic varhcar(128),
  body text,
  primary key(entryid)
);

CREATE TABLE authors (
  authorid int not null auto_increment,
  name varchar(128),
  primary key(authorid)
);
*/

function entry_topic_directory($topic) {
	mysql_query("SELECT * 
                 FROM entries e, authors a
                 WHERE topic = '$topic'
      		     AND e.authorid = a.authorid");
	echo "<table>";
	while ($array = mysql_fetch_assoc()) {
?>
<tr><td><?= $array['$title'] ?></td>
<td><?= $array['name'] ?></td></tr>
<?php
	}
}
?>

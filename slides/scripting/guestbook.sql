CREATE TABLE guestbook (
  entry_id int(4) NOT NULL auto_increment,
  name varchar(150) NOT NULL default '',
  email varchar(150) NOT NULL default '',
  msg text NOT NULL,
  remote_host varchar(150) NOT NULL default '',
  PRIMARY KEY  (entry_id)
) TYPE=MyISAM;

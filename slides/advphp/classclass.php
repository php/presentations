<?php
class DB::MySQL {
    var $host = '';
    
    function db_connect($user) {
	print "Connecting to MySQL database '$this->host' as $user\n";
    }
}

class DB::Oracle {
    var $host = 'localhost';
    
    function db_connect($user) {
	print "Connecting to Oracle database '$this->host' as $user\n";
    }
}

$MySQL_obj = new DB::MySQL();
$MySQL_obj->db_connect('Susan');

$Oracle_obj = new DB::Oracle();
$Oracle_obj->db_connect('Barbara');
?>

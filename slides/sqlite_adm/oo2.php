<pre>
<?php
$db = new SQLiteDatabase(dirname(__FILE__)."/db.sqlite");
// CREATE TABLE auth_tbl 
//	(login VARCHAR(32), passwd CHAR(32))
$res = $db->query("SELECT * FROM auth_tbl");

/* import result into my_class setting the row number 
 * and indicating that the data is from a database */
while (($obj = $res->fetchObject("my_class", array(TRUE)))) {
	var_dump($obj);
}

class my_class
{
	public $from_db, $row_num=0;
	private $passwd, $crypt_key = "value";

	/* constructor sets the row number 
	 * and sets a flag indicating
	 * that the data originated from the database */
	function __construct($fdb=FALSE)
	{
		static $counter;
		$this->row_num = (int) $counter++;
		$this->from_db = $fdb;
	}

	private function decode_passwd() { }

	private function encode_passwd() { }

	function change_password()
	{
		if (decode_passwd($this->passwd) == $_POST['passwd']) {
			$new_pass = encode_passwd($_POST['passwd']);
			/* update password query */
		}
	}
}
?>
</pre>
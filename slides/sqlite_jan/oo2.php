<pre>
<?php
class my_class
{
	public $from_db, $row_num=0;
	private $passwd;

	/* constructor sets the row number 
	 * and sets a flag indicating
	 * that the data originated from the database */
	function __construct($row=0, $fdb=FALSE)
	{
		$this->row_num = $row;
		$this->from_db = $fdb;
	}
}

	$db = new sqlite_db(dirname(__FILE__)."/db.sqlite");
	$res = $db->query("SELECT * FROM auth_tbl");

	$i = 0;
	/* import result into my_class setting the row number 
	 * and indicating that the data is from a database */
	while (($obj = $res->fetch_object("my_class", array(++$i, TRUE)))) {
		var_dump($obj);
	}
?>
</pre>
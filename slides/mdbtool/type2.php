<?php

	$db = mdb_open("test.mdb");

	for ($i = 1; $i <= 13; $i++) {
		echo "Type $i is ".mdb_type_name($db, $i)."\n";
    }

?>
<?php
sqlite_query("BEGIN", sqlite_r);
while (($row = fgetcsv($fp, 4096))) {
	/* previously seen query code */
}
sqlite_query("COMMIT", sqlite_r);
?>
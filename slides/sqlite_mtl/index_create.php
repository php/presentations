<?php
// CREATE [UNIQUE] INDEX {index_name} ON {table_name}({column names seperated by commas})

sqlite_query("CREATE INDEX cc_code ON ip_ranges(country_code)", $db);
sqlite_query("CREATE INDEX ipr ON ip_ranges(ip_start, ip_end)", $db);
sqlite_query("CREATE UNIQUE INDEX cl ON country_data(country_name)", $db);
sqlite_query("CREATE UNIQUE INDEX c2 ON country_data(cc_code_2)", $db);
?>
<?php
// create database
$db = sqlite_open("./ip.db");

/* create table to store country information */
sqlite_query("CREATE TABLE country_data (
	id INTEGER PRIMARY KEY,
	cc_code_2,
	cc_code_3,
	country_name
)", $db);

/* create table to store IP ranges */
sqlite_query($db, "CREATE TABLE ip_ranges (
	ip_start INTEGER,
	ip_end INTEGER,
	country_code INTEGER)"
);
?>
<?php

$cleardb_url = parse_url(getenv("mysql://b8085750c4cb45:741318c2@us-cdbr-east-06.cleardb.net/heroku_eed5da92befa448?reconnect=true"));
$cleardb_server = "us-cdbr-east-06.cleardb.net";
$cleardb_username = "b8085750c4cb45";
$cleardb_password = "741318c2";
$cleardb_db = "heroku_eed5da92befa448";
$active_group = 'default';
$query_builder = TRUE;

$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
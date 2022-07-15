<?php

$url = parse_url(getenv("mysql://bfa094c41daca2:13639c91@us-cdbr-east-06.cleardb.net/heroku_c3d91442ca8b559?reconnect=true"));

$cleardb_url = parse_url(getenv($url));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$conn = new mysql($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
echo $conn->connect_error;

?>
<?php

$url = parse_url(getenv("mysql://b59a876e2981e8:959d7daf@us-cdbr-east-03.cleardb.com/heroku_cd1f104ee4baddf?reconnect=true"));

$cleardb_url = parse_url(getenv($url));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

?>
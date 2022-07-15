<?php

$url = parse_url(getenv("mysql://b59a876e2981e8:959d7daf@us-cdbr-east-03.cleardb.com/heroku_cd1f104ee4baddf?reconnect=true"));

$server = "us-cdbr-east-03.cleardb.com";
$username = "b59a876e2981e8";
$password = "959d7daf";
$db = "heroku_cd1f104ee4baddf";

$conn =  new mysqli_connect($server, $username, $password, $db);

?>
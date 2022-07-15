<?php

$url = parse_url(getenv("mysql://b59a876e2981e8:959d7daf@us-cdbr-east-03.cleardb.com/heroku_cd1f104ee4baddf?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn =  mysqli($server, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
<?php

$url = parse_url(getenv("mysql://b59a876e2981e8:959d7daf@us-cdbr-east-03.cleardb.com/heroku_cd1f104ee4baddf?reconnect=true"));

$server = "us-cdbr-east-03.cleardb.com";
$username = "b59a876e2981e8";
$password = "959d7daf";
$db = "heroku_cd1f104ee4baddf";

try{
  $conn = new PDO("mysql:host=cdbr-east-03.cleardb.com;dbname=myDB", "b59a876e2981e8", "959d7daf");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$conn =  new mysqli_connect($server, $username, $password, $db);

?>
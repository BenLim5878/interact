<?php
session_start();
$reply = $_COOKIE['reply'];
$noURI = urldecode($reply);
$object = json_decode($noURI);
$desc =  str_replace(array('"', "'"), array('\"', "\'"), $object->reply);
$user_id = $_SESSION['userid'];
$id = htmlspecialchars($_GET["id"]);

$serverName = "us-cdbr-east-06.cleardb.net";
$dBUsername = "b8085750c4cb45";
$dBPassword = "741318c2";
$dBName = "heroku_eed5da92befa448";

$conn =  mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE reply SET content='$desc' WHERE (reply_id ='$object->id')";
mysqli_query($conn, $sql);
echo $conn->error;

$cookie_name = "newEditResponse";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");


setcookie("reply", "", time() - 3600, "/");
header("location: ./post/showPost.php?id=" . $id);
exit();
$conn->close();

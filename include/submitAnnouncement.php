<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
$userID = $_SESSION["userid"];
include './dbh.inc.php';
$timenow = date('Y-m-d H:i:s');
if (isset($_GET['content'])) {
    $content = $_GET['content'];
    $desc =  str_replace(array('"', "'"), array('\"', "\'"), $content);
    mysqli_query($conn, "INSERT INTO announcement(content,post_time,usersId) VALUES ('$desc','$timenow','$userID')");
    echo $conn->error;
}

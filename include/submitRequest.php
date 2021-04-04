<?php
include_once './dbh.inc.php';
date_default_timezone_set("Asia/Kuala_Lumpur");
session_start();
$timenow = date('Y-m-d H:i:s');
$userID = $_SESSION["userid"];
if (isset($_GET['content'])) {
    $subject = $_GET['subject'];
    $content = $_GET['content'];
    $desc =  str_replace(array('"', "'"), array('\"', "\'"), $content);
    mysqli_query($conn, ("INSERT INTO request (subject,content,dateRequested,user_id) VALUES ('$subject','$desc','$timenow','$userID')"));
    echo $conn->error;
}
$cookie_name = "submittedRequest";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");
$conn->close();

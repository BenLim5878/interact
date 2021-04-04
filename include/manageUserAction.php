<?php
include './dbh.inc.php';
$ajaxData = $_GET['row'];
$role = $_GET['role'];
$changeType = $_GET['changeType'];
if ($changeType == 'role') {
    for ($i = 0; $i < count($ajaxData); $i++) {
        mysqli_query($conn, "UPDATE users SET role='$role' WHERE usersId='$ajaxData[$i]'");
        if ($role == "moderator") {
            $notificationContent = "Congratulations, you have been promoted to moderator!";
            mysqli_query($conn, "INSERT INTO notification (usersId,type, message,status,link) VALUES ('$ajaxData[$i]','promotion','$notificationContent','unread','/interact/include/user/myAccount.php')");
            echo $conn->error;
        }
    }
} elseif ($changeType == 'account_status') {
    for ($i = 0; $i < count($ajaxData); $i++) {
        mysqli_query($conn, "UPDATE users SET account_status='$role' WHERE usersId='$ajaxData[$i]'");
    }
}

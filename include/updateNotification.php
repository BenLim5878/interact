<?php
session_start();
include './dbh.inc.php';
mysqli_query($conn, "UPDATE notification SET status='read' WHERE usersId='$_SESSION[userid]' AND status='unread' ");
echo $conn->error;

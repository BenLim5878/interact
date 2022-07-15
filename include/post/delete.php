<?php
session_start();
$refid = htmlspecialchars($_GET["id"]);
$userID = '';
$role = '';
if ($_GET['user']) {
    $userID = $_GET['user'];
}
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "interact";
$conn =  mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$post_id = retrieveID($conn, $refid);
$post_title = retrieveTitle($conn, $refid);
function retrieveID($conn, $refid)
{
    $user_id = $_SESSION['userid'];
    $query =  "SELECT * FROM post WHERE ref_ID='$refid'";
    $userRole = mysqli_query($conn, "SELECT * FROM users WHERE usersId = '$user_id'");
    while ($user = $userRole->fetch_assoc()) {
        $role = $user['role'];
    }
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $post_id = $row['post_id'];
        $ownerID = $row['usersId'];
        echo $ownerID;
        echo $user_id;
        if ($ownerID == $user_id || $role == "moderator") {
            return $post_id;
            break;
        } else {
            header("location: /userPage.php");
            exit();
        }
    }
}

function retrieveTitle($conn, $refid)
{
    $query =  "SELECT * FROM post WHERE ref_ID='$refid'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $post_title = $row['title'];
        return $post_title;
    }
}

$query3 = "SELECT * FROM postreply WHERE post_id='$post_id'";
$result3 = mysqli_query($conn, $query3);
echo $conn->error;
while ($row3 = $result3->fetch_assoc()) {
    $reply_id = $row3['reply_id'];
    $query2 = "DELETE FROM reply WHERE reply_id='$reply_id'";
    mysqli_query($conn, $query2);
}

$sql = "DELETE FROM post WHERE post_id='$post_id'";
mysqli_query($conn, $sql);
echo $conn->error;
if ($userID != '') {
    $notificationContent = "Your post $post_title has been removed by moderator";
    mysqli_query($conn, "INSERT INTO notification (usersId,type, message,status,link) VALUES ($userID,'post deleted','$notificationContent','unread','#')");
}

$cookie_name = "deletedPost";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");

header("location: /userPage.php");
exit();
$conn->close();

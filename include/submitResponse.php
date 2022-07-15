
<?php
session_start();
$reply = $_COOKIE['reply'];
$noURI = urldecode($reply);
$content = json_decode($noURI);
$serverName = "us-cdbr-east-06.cleardb.net";
$dBUsername = "b8085750c4cb45";
$dBPassword = "741318c2";
$dBName = "heroku_eed5da92befa448";
$desc =  str_replace(array('"', "'"), array('\"', "\'"), $content->reply);
$conn =  mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
$user_id = $_SESSION['userid'];
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO reply (content,usersId) VALUES('$desc','$user_id')";
mysqli_query($conn, $sql);
echo $conn->error;

function retrieveID($conn, $refid)
{
    $query =  "SELECT * FROM post WHERE ref_ID='$refid'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $post_id = $row['post_id'];
        return $post_id;
    }
}
function retrieveTitle($conn, $refid)
{
    $query =  "SELECT * FROM post WHERE ref_ID='$refid'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $post_title  = $row['title'];
        return $post_title;
    }
}
function retrievePostUserID($conn, $refid)
{
    $query =  "SELECT * FROM post WHERE ref_ID='$refid'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $postUserID  = $row['usersId'];
        return $postUserID;
    }
}
function retrievereplyID($conn)
{
    $query2 =  "SELECT * FROM reply WHERE reply_id=(SELECT max(reply_id) FROM reply)";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = $result2->fetch_assoc()) {
        $reply_id = $row2['reply_id'];
        return $reply_id;
    }
}
$postUserID = retrievePostUserID($conn, $content->id);
$post_title = retrieveTitle($conn, $content->id);
$post_id = retrieveID($conn, $content->id);
$reply_id = retrievereplyID($conn);
$sql3 = "INSERT INTO postreply (post_id,reply_id) VALUES('$post_id','$reply_id')";
mysqli_query($conn, $sql3);
echo $conn->error;
if ($user_id != $postUserID) {
    $userName = mysqli_query($conn, "SELECT * FROM users WHERE usersId='$user_id'");
    while ($userNameRow = $userName->fetch_assoc()) {
        $userFullName = $userNameRow['usersFname'] . ' ' . $userNameRow['usersLname'];
        $notificationContent = "$userFullName has replied on your post $post_title";
        mysqli_query($conn, "INSERT INTO notification (usersId,type, message,status,link) VALUES ($postUserID,'comment','$notificationContent','unread','./include/post/showPost.php?id=$content->id')");
        echo $conn->error;
    }
}


$cookie_name = "newReply";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");

setcookie("reply", "", time() - 3600, "/");
header("location: ./post/showPost.php?id=" . $content->id);
exit();
$conn->close();

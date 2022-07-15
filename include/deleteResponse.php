<?php
session_start();
$replyID = htmlspecialchars($_GET["reply"]);
$postID = htmlspecialchars($_GET["id"]);

include_once './dbh.inc.php';
$user_id = $_SESSION['userid'];
$result = mysqli_query($conn, "SELECT * FROM reply RIGHT JOIN (SELECT ref_ID,postreply.reply_id FROM postreply LEFT JOIN post ON postreply.post_id = post.post_id) AS joinTable ON reply.reply_id = joinTable.reply_id WHERE ref_ID = '$postID' AND reply.reply_id = '$replyID'");
echo $conn->error;
while ($row = $result->fetch_assoc()) {
    $ownerID = $row['usersId'];
    if ($user_id != $ownerID) {
        header("location: ./include/post/showPost.php?id=$postID");
        exit();
        $conn->close();
    } else {
        $sql = "DELETE FROM reply WHERE reply_id='$replyID'";
        mysqli_query($conn, $sql);
        echo $conn->error;
        $cookie_name = "deletedResponse";
        $cookie_value = "yes";
        setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");

        header("location: ./include/post/showPost.php?id=$postID");
        exit();
        $conn->close();
    }
}

<?php
include './dbh.inc.php';
$refID = $_GET['postID'];
$postCategory = $_GET['categoryList'];
$postID = retrieveID($conn, $refID);
deletePreviousCategory($conn, $postID);
retrieveCategory($postCategory, $conn, $postID);
// Function lists
function retrieveID($conn, $id)
{
    $query =  "SELECT * FROM post WHERE ref_ID='$id'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $post_id = $row['post_id'];
        return $post_id;
    }
}
function deletePreviousCategory($conn, $id)
{
    $query = "DELETE FROM postcategory WHERE post_id='$id'";
    mysqli_query($conn, $query);
    echo $conn->error;
}
function retrieveCategory($object, $conn, $id)
{
    for ($i = 0; $i < count($object); $i++) {
        $element = $object[$i];
        $query =  "SELECT * FROM category WHERE category_name='$element'";
        $result = mysqli_query($conn, $query);
        while ($row = $result->fetch_assoc()) {
            $category_id = $row['category_id'];
            $query2 = "INSERT postcategory (category_id,post_id) VALUES ('$category_id','$id')";
            mysqli_query($conn, $query2);
        }
    }
}
$posts = mysqli_query($conn, "SELECT * FROM post WHERE ref_ID='$refID'");
echo $conn->error;
while ($post = $posts->fetch_assoc()) {
    $postTitle = $post['title'];
    $postUserId = $post['usersId'];
    $notificationContent = "Your post $postTitle has been arranged by moderator";
    mysqli_query($conn, "INSERT INTO notification (usersId,type, message,status,link) VALUES ($postUserId,'post modification','$notificationContent','unread','/include/post/showPost.php?id=$refID')");
    echo $conn->error;
}
$cookie_name = "newEditPost";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");

$conn->close();

<?php
session_start();
$id = htmlspecialchars($_GET["id"]);
$form = $_COOKIE['form'];
$noURI = urldecode($form);
$object = json_decode($noURI);
$desc =  str_replace(array('"', "'"), array('\"', "\'"), $object->content);
$title = str_replace(array('"', "'"), array('\"', "\'"), $object->title);
$user_id = $_SESSION['userid'];

$serverName = "sql307.infinityfree.com";
$dBUsername = "if0_34999721";
$dBPassword = "NqBGef7XU2spD";
$dBName = "if0_34999721_interact";

$conn =  mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE post SET title='$title', description='$desc',type='$object->type' WHERE (ref_ID ='$id')";
mysqli_query($conn, $sql);
echo $conn->error;
deletePreviousCategory($conn, $id);
retrieveCategory($object, $conn, $id);

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
    $postid = retrieveID($conn, $id);
    $query = "DELETE FROM postcategory WHERE post_id='$postid'";
    mysqli_query($conn, $query);
    echo $conn->error;
}


function retrieveCategory($object, $conn, $id)
{
    for ($i = 0; $i < count($object->category); $i++) {
        $element = $object->category[$i];
        $query =  "SELECT * FROM category WHERE category_name='$element'";
        $result = mysqli_query($conn, $query);
        while ($row = $result->fetch_assoc()) {
            $category_id = $row['category_id'];
            $thispost = retrieveID($conn, $id);
            $query2 = "INSERT postcategory (category_id,post_id) VALUES ('$category_id','$thispost')";
            mysqli_query($conn, $query2);
        }
    }
}

$cookie_name = "newEditPost";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");


setcookie("form", "", time() - 3600, "/");
header("location: ./post/showPost.php?id=" . $id);
exit();
$conn->close();

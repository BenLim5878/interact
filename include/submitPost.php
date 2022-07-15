<?php
session_start();
$form = $_COOKIE['form'];
$noURI = urldecode($form);
$object = json_decode($noURI);
$desc =  str_replace(array('"', "'"), array('\"', "\'"), $object->content);
$title = str_replace(array('"', "'"), array('\"', "\'"), $object->title);
$user_id = $_SESSION['userid'];

$serverName = "us-cdbr-east-06.cleardb.net";
$dBUsername = "b8085750c4cb45";
$dBPassword = "741318c2";
$dBName = "heroku_eed5da92befa448";

$conn =  mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$refid = generateRandomString();
$sql = "INSERT INTO post (title, description, type, ref_ID,usersId) VALUES('$title','$desc','$object->type','$refid','$user_id')";
mysqli_query($conn, $sql);
echo $conn->error;
retrieveCategory($object, $conn, $refid);


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function retrieveID($conn, $refid)
{
    $query =  "SELECT * FROM post WHERE ref_ID='$refid'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        $post_id = $row['post_id'];
        return $post_id;
    }
}

function retrieveCategory($object, $conn, $refid)
{
    for ($i = 0; $i < count($object->category); $i++) {
        $element = $object->category[$i];
        $query =  "SELECT * FROM category WHERE category_name='$element'";
        $result = mysqli_query($conn, $query);
        while ($row = $result->fetch_assoc()) {
            $category_id = $row['category_id'];
            $thispost = retrieveID($conn, $refid);
            $query2 = "INSERT INTO postcategory (category_id,post_id) VALUES ('$category_id','$thispost')";
            mysqli_query($conn, $query2);
        }
    }
}

$cookie_name = "newPost";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");


setcookie("form", "", time() - 3600, "/");
header("location: ./post/showPost.php?id=" . $refid);
exit();
$conn->close();

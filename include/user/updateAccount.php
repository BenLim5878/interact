<?php
session_start();
include_once '/../dbh.inc.php';
$userID = $_SESSION["userid"];
if (isset($_POST['email'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, ("UPDATE users SET usersFname='$firstName',usersLname='$lastName',usersEmail='$email',usersPwd='$hashedPwd' WHERE usersId = $userID"));
}
$cookie_name = "updateAccount";
$cookie_value = "yes";
setcookie($cookie_name, $cookie_value, time() + (1000 * 30), "/");

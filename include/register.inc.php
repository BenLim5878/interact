<?php

if (isset($_POST["submit"])) {

  $Fname = $_POST["Fname"];
  $Lname = $_POST["Lname"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];


  require_once 'dbh.inc.php';
  /*error handler*/
} else {
  header("location: ../register.php");
  exit();
}

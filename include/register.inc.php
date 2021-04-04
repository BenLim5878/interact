<?php

if (isset($_POST["submit"])) {

  $Fname = $_POST["Fname"];
  $Lname = $_POST["Lname"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];


  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  /*error handler*/

  if (emptyInputRegister($Fname, $Lname, $email, $pwd, $pwdRepeat) !== false) {
    header("location: ../register.php?error=emptyinput");
    exit();
  }
  if (invalidFname($Fname) !== false) {
    header("location: ../register.php?error=invalidname");
    exit();
  }
  if (invalidLname($Lname) !== false) {
    header("location: ../register.php?error=invalidname");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../register.php?error=invalidemail");
    exit();
  }
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../register.php?error=passwordsdontmatch");
    exit();
  }
  if (uidExists($conn, $Fname, $Lname, $email) !== false) {
    header("location: ../register.php?error=accountexists");
    exit();
  }

  createUser($conn, $Fname, $Lname, $email, $pwd);
} else {
  header("location: ../register.php");
  exit();
}

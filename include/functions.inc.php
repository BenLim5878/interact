<?php
function emptyInputRegister($Fname, $Lname, $email, $pwd, $pwdRepeat)
{
  $result;
  if (empty($Fname) || empty($Lname) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidFname($Fname)
{
  $result;
  if (!preg_match("/^[a-zA-Z0-9 ]*$/", $Fname)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidLname($Lname)
{
  $result;
  if (!preg_match("/^[a-zA-Z0-9 ]*$/", $Lname)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function invalidEmail($email)
{
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else {
    if (preg_match('/@mail\.apu\.edu\.my$/i', $email) > 0) {
      $result = false;
    } else {
      $result = true;
    }
  }
  return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
  $result;
  if ($pwd !== $pwdRepeat) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

/*UID exists */

function uidExists($conn, $Fname, $Lname, $email)
{
  $sql = "SELECT * FROM users WHERE usersFname = ? OR usersLname = ? OR usersEmail = ?;";
  /* Initialize  Prepare statement to avoid user type in code*/
  $stmt = mysqli_stmt_init($conn);
  /*error checking*/
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sss", $Fname, $Lname, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  /* check result*/
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}


/*create user*/
function createUser($conn, $Fname, $Lname, $email, $pwd)
{
  $sql = "INSERT INTO users (usersFname, usersLname, usersEmail, usersPwd) VALUES(?,?,?,?);";
  echo $Lname;
  /* Initialize  Prepare statement to avoid user type in code*/
  $stmt = mysqli_stmt_init($conn);
  /*error checking*/
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../register.php?error=stmtfailed");
    exit();
  }

  /*hashed password */
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  /*binding parameters*/
  mysqli_stmt_bind_param($stmt, "ssss", $Fname, $Lname, $email, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../register.php?error=none");
  exit();
}


/*login functions*/

function emptyInputLogin($email, $pwd)
{
  $result;
  if (empty($email) || empty($pwd)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function loginUser($conn, $email, $pwd)
{
  $uidExists = uidExists($conn, $Fname, $Lname, $email);
  /*error handler*/
  if ($uidExists == false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  /*check password*/
  $pwdHashed = $uidExists["usersPwd"]; /*grab data from DB*/
  $checkPwd = password_verify($pwd, $pwdHashed);
  $userAccountStatus = '';
  if ($checkPwd == false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  } else if ($checkPwd == true) { /*if enter correctly, enter session*/
    $allUser = mysqli_query($conn, "SELECT * FROM users WHERE usersId = '$uidExists[usersId]'");
    echo $conn->error;
    while ($eachUser = $allUser->fetch_assoc()) {
      $userAccountStatus = $eachUser['account_status'];
    }
    if ($userAccountStatus == "banned") {
      header("location: ../login.php?error=userBanned");
      exit();
    } else {
      session_start();
      $_SESSION["userid"] = $uidExists["usersId"];
      $_SESSION["status"] = "Logged In";
      $_SESSION["role"] = $uidExists["role"];
      if ($uidExists["role"] == "member" || $uidExists["role"] == "moderator") {
        header("location: ../userPage.php");
        exit();
      } elseif ($uidExists["role"] == "admin") {
        header("location: ../adminPage.php");
        exit();
      }
    }
  }
}

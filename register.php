<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Interact</title>
  <link rel="shortcut icon" type="image/png" href="materials/logo/logo-transparent.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styles/style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://kit.fontawesome.com/2fbbb4bb77.js" crossorigin="anonymous"></script>
</head>

<body class="loginregister">
  <div class="errormessage">
    <i class="fas fa-exclamation-circle"></i>
    <h5></h5>
  </div>
  <section>
    <a href="index.php" id="close_btn">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.26933 329">
        <g class="vectorColor">
          <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
        </g>
      </svg>
    </a>
    <div id="register-greeting">
      <span id="logo-loginregister"></span>
      <h1>Break through with Interact.</h1>
      <h2>Have already an account? <a href="/login.php">Login here</a></h2>
    </div>
    <form id="signout" action="include/register.inc.php" method="post" autocomplete="off">
      <div>
        <input id="shortInput" type="text" name="Fname" placeholder="First Name">
        <input id="mediumInput" type="text" name="Lname" placeholder="Last Name">
        <input type="text" name="email" placeholder="Email Address">
        <input class="passwordField" type="password" name="pwd" placeholder="Password">
        <input class="passwordField" type="password" name="pwdrepeat" placeholder="Comfirm Password">
        <input id="showPassword_chkbox" type="checkbox" name="showPassword" value="show" onclick="testing()"><label for="showPassword">Show Password</label>
        <script>
          var value = 0;

          function testing() {
            console.log(value);
            if (value == 0) {
              for (item of document.querySelectorAll('.passwordField')) {
                item.type = 'text';
              }
              value += 1;
            } else if (value == 1) {
              for (item of document.querySelectorAll('.passwordField')) {
                item.type = 'password';
              }
              value -= 1;
            }
          }
        </script>
        <button type="submit" name="submit">
          <svg xmlns="http://www.w3.org/2000/svg" id="padlock-icon2" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            <path d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z" />
          </svg>
          Sign up
        </button>
        <h3>By signing up you agree to our <a style="font-size:0.67708333333vw;color:#EF6C35" href="/archive/rules-regulations/policy1.php" me:hover>Terms of Use</a> and <a style="font-size:0.67708333333vw;color:#EF6C35" href="/archive/about/safeInteract2.php">Privacy Policy</a>.
        </h3>
      </div>
    </form>

  </section>
  <div id="register-background"></div>
  <script>
    $(document).ready(function() {
      var currentURL = window.location.href
      var url = new URL(currentURL)
      if (url.searchParams.get("error") == "emptyinput") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Please fill in all the fill !")
        $('#signout input').css('border', '1px solid rgb(231, 74, 74)')
      } else if (url.searchParams.get("error") == "invalidname") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Please enter a valid username !")
        $('#signout input[name="Fname"]').css('border', '1px solid red')
        $('#signout input[name="Lname"]').css('border', '1px solid red')
      } else if (url.searchParams.get("error") == "invalidemail") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Please enter a valid email !")
        $('#signout input[name="email"]').css('border', '1px solid red')
      } else if (url.searchParams.get("error") == "passwordsdontmatch") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Passwords you entered don't match !")
        $('#signout input[name="pwd"]').css('border', '1px solid red')
        $('#signout input[name="pwdrepeat"]').css('border', '1px solid red')
      } else if (url.searchParams.get("error") == "stmtfailed") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Something went wrong, please try again")
      } else if (url.searchParams.get("error") == "accountexists") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("This account already exists")
        $('#signout input[name="Fname"]').css('border', '1px solid red')
        $('#signout input[name="Lname"]').css('border', '1px solid red')
      } else if (url.searchParams.get("error") == "none") {
        window.location.href = "/login.php?status=registeredSuccess";
      } else {
        $('.errormessage').css('display', 'none')
      }
    });
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In - Interact</title>
  <link rel="shortcut icon" type="image/png" href="materials/logo/logo-transparent.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/interact/styles/style.css">
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
    <div id="login-greeting">
      <span id="logo-loginregister"></span>
      <h1>Welcome Back.</h1>
      <h2>New to Interact? <a href="/interact/register.php">Sign Up</a></h2>
    </div>
    <form id="signin" action="include/login.inc.php" method="post" autocomplete="off">
      <div class="inputGroup" style="margin-bottom:1.04166vw;">
        <input type="text" name="email" placeholder="Email Address">
      </div>
      <div class="inputGroup" style="padding-right:0px;width:22.8125vw">
        <input id="passwordInput" type="password" name="pwd" placeholder="Password" style="width:20.57291666vw;height:1.041666666666vw;">
        <button type="button" name="showPassword">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="eyeIcon" x="0px" y="0px" viewBox="0 0 512.17 512.17" style="enable-background:new 0 0 512.17 512.17;" xml:space="preserve">
            <g>
              <g>
                <g>
                  <path d="M509.311,245.418c-3.84-6.4-93.44-160-253.227-160s-249.387,153.6-253.227,160c-3.811,6.601-3.811,14.733,0,21.333     c3.84,6.4,93.44,160,253.227,160s249.387-153.6,253.227-160C513.122,260.151,513.122,252.019,509.311,245.418z M256.085,384.085     c-112.64,0-187.307-95.573-209.28-128c21.333-32.427,96.427-128,209.28-128s187.307,95.573,209.28,128     C443.391,288.511,369.151,384.085,256.085,384.085z" />
                  <path d="M256.085,149.418c-58.91,0-106.667,47.756-106.667,106.667s47.756,106.667,106.667,106.667     s106.667-47.756,106.667-106.667S314.995,149.418,256.085,149.418z M256.085,320.085c-35.346,0-64-28.654-64-64s28.654-64,64-64     s64,28.654,64,64S291.431,320.085,256.085,320.085z" />
                  <circle cx="277.418" cy="234.751" r="21.333" />
                </g>
              </g>
            </g>
          </svg>
        </button>
      </div>
      <button id="login_btn" type="submit" name="submit">
        <svg xmlns="http://www.w3.org/2000/svg" id="padlock-icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
          <path d="m18.75 24h-13.5c-1.24 0-2.25-1.009-2.25-2.25v-10.5c0-1.241 1.01-2.25 2.25-2.25h13.5c1.24 0 2.25 1.009 2.25 2.25v10.5c0 1.241-1.01 2.25-2.25 2.25zm-13.5-13.5c-.413 0-.75.336-.75.75v10.5c0 .414.337.75.75.75h13.5c.413 0 .75-.336.75-.75v-10.5c0-.414-.337-.75-.75-.75z" />
          <path d="m17.25 10.5c-.414 0-.75-.336-.75-.75v-3.75c0-2.481-2.019-4.5-4.5-4.5s-4.5 2.019-4.5 4.5v3.75c0 .414-.336.75-.75.75s-.75-.336-.75-.75v-3.75c0-3.309 2.691-6 6-6s6 2.691 6 6v3.75c0 .414-.336.75-.75.75z" />
          <path d="m12 17c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm0-2.5c-.275 0-.5.224-.5.5s.225.5.5.5.5-.224.5-.5-.225-.5-.5-.5z" />
          <path d="m12 20c-.414 0-.75-.336-.75-.75v-2.75c0-.414.336-.75.75-.75s.75.336.75.75v2.75c0 .414-.336.75-.75.75z" />
        </svg>
        Log In
      </button>
      <h3>By continuing you accept our <a style="font-size:0.67708333333vw;" href="/interact/archive/rules-regulations/policy1.php">Terms of Use</a> and <a style="font-size:0.67708333333vw;" href="/interact/archive/about/safeInteract2.php">Privacy Policy</a>.</h3>
    </form>

  </section>
  <div id="login-background"></div>
  <script>
    const showPassword = document.querySelector('.inputGroup button');
    const passwordInput = document.querySelector('#passwordInput');
    showPassword.addEventListener("mousedown", function() {
      passwordInput.type = 'text';
    })
    showPassword.addEventListener("mouseup", function() {
      passwordInput.type = 'password';
    })
  </script>
  <script>
    $(document).ready(function() {
      var currentURL = window.location.href
      var url = new URL(currentURL)
      if (url.searchParams.get("error") == "emptyinput") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Please fill in all the fields !")
        $('.inputGroup').css('border', '1px solid red')
      } else if (url.searchParams.get("error") == "wronglogin") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Please enter the correct credentials !")
        $('.inputGroup').css('border', '1px solid red')
      } else if (url.searchParams.get("error") == "userBanned") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Your account has been banned !")
      } else if (url.searchParams.get("status") == "registeredSuccess") {
        $('.errormessage').css('display', 'flex')
        $('.errormessage').find('h5').text("Congratulations ! You have registered into Interact !")
        $('.errormessage').css('backgroundColor', '#28b862')
        setTimeout(() => {
          $('.errormessage').css('transform', 'translateY(-1000px)')
        }, 5000);
        setTimeout(() => {
          $('.errormessage').css('display', 'none')
        }, 7000);
      } else {
        $('.errormessage').css('display', 'none')
      }
    });
  </script>
</body>

</html>
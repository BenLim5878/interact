<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/interact/styles/header2.css">
    <link rel="stylesheet" href="/interact/styles/myAccount.css">
    <link rel="shortcut icon" type="image/png" href="/interact/materials/logo/logo-transparent.png">
    <!-- jQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Profile page</title>
</head>

<body>
    <header>
        <?php
        include '../header2.php'
        ?>
    </header>
    <main>
        <div class="successmessage">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <g>
                    <g>
                        <path d="M383.841,171.838c-7.881-8.31-21.02-8.676-29.343-0.775L221.987,296.732l-63.204-64.893    c-8.005-8.213-21.13-8.393-29.35-0.387c-8.213,7.998-8.386,21.137-0.388,29.35l77.492,79.561    c4.061,4.172,9.458,6.275,14.869,6.275c5.134,0,10.268-1.896,14.288-5.694l147.373-139.762    C391.383,193.294,391.735,180.155,383.841,171.838z" />
                    </g>
                </g>
                <g>
                    <g>
                        <path d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M256,470.487    c-118.265,0-214.487-96.214-214.487-214.487c0-118.265,96.221-214.487,214.487-214.487c118.272,0,214.487,96.221,214.487,214.487    C470.487,374.272,374.272,470.487,256,470.487z" />
                    </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
            </svg>
        </div>
        <div class="content-window">
            <div class="cover">
                <div id="profile-img"></div>
                <div class="user-profile-basic-info">
                    <?php
                    include '../dbh.inc.php';
                    $userEmail = '';
                    $userRole = '';
                    $userFirstName = '';
                    $userLastName = '';
                    $userID = $_SESSION["userid"];
                    $name = "SELECT * FROM users WHERE usersId='$userID'";
                    $currentDate = date("Y-m-d");
                    $result = mysqli_query($conn, $name);
                    while ($row = $result->fetch_assoc()) {
                        $userEmail = $row['usersEmail'];
                        $userRole = $row['role'];
                        $dateJoined = $row['dateJoined'];
                        $userFirstName = $row['usersFname'];
                        $userLastName = $row['usersLname'];
                        echo "<h2>$userFirstName $userLastName</h2>";
                        $diff = abs(strtotime($currentDate) - strtotime($dateJoined));
                        $years = floor($diff / (365 * 60 * 60 * 24));
                        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                        echo "<h3>Joined ";
                        if ($years > 0) {
                            if ($years == 1) {
                                echo ('1 year ago');
                            } else {
                                echo ($years . ' years ago');
                            }
                        } else if ($months > 0) {
                            if ($months == 1) {
                                echo ('1 month ago');
                            } else {
                                echo ($months . ' months ago');
                            }
                        } else if ($days == 0) {
                            echo ('Few hours ago');
                        } else {
                            echo ($days . ' days ago');
                        }
                        echo "</h3>";
                    }
                    ?>
                </div>
                <button id="setting-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="m499.953125 197.703125-39.351563-8.554687c-3.421874-10.476563-7.660156-20.695313-12.664062-30.539063l21.785156-33.886719c3.890625-6.054687 3.035156-14.003906-2.050781-19.089844l-61.304687-61.304687c-5.085938-5.085937-13.035157-5.941406-19.089844-2.050781l-33.886719 21.785156c-9.84375-5.003906-20.0625-9.242188-30.539063-12.664062l-8.554687-39.351563c-1.527344-7.03125-7.753906-12.046875-14.949219-12.046875h-86.695312c-7.195313 0-13.421875 5.015625-14.949219 12.046875l-8.554687 39.351563c-10.476563 3.421874-20.695313 7.660156-30.539063 12.664062l-33.886719-21.785156c-6.054687-3.890625-14.003906-3.035156-19.089844 2.050781l-61.304687 61.304687c-5.085937 5.085938-5.941406 13.035157-2.050781 19.089844l21.785156 33.886719c-5.003906 9.84375-9.242188 20.0625-12.664062 30.539063l-39.351563 8.554687c-7.03125 1.53125-12.046875 7.753906-12.046875 14.949219v86.695312c0 7.195313 5.015625 13.417969 12.046875 14.949219l39.351563 8.554687c3.421874 10.476563 7.660156 20.695313 12.664062 30.539063l-21.785156 33.886719c-3.890625 6.054687-3.035156 14.003906 2.050781 19.089844l61.304687 61.304687c5.085938 5.085937 13.035157 5.941406 19.089844 2.050781l33.886719-21.785156c9.84375 5.003906 20.0625 9.242188 30.539063 12.664062l8.554687 39.351563c1.527344 7.03125 7.753906 12.046875 14.949219 12.046875h86.695312c7.195313 0 13.421875-5.015625 14.949219-12.046875l8.554687-39.351563c10.476563-3.421874 20.695313-7.660156 30.539063-12.664062l33.886719 21.785156c6.054687 3.890625 14.003906 3.039063 19.089844-2.050781l61.304687-61.304687c5.085937-5.085938 5.941406-13.035157 2.050781-19.089844l-21.785156-33.886719c5.003906-9.84375 9.242188-20.0625 12.664062-30.539063l39.351563-8.554687c7.03125-1.53125 12.046875-7.753906 12.046875-14.949219v-86.695312c0-7.195313-5.015625-13.417969-12.046875-14.949219zm-152.160156 58.296875c0 50.613281-41.179688 91.792969-91.792969 91.792969s-91.792969-41.179688-91.792969-91.792969 41.179688-91.792969 91.792969-91.792969 91.792969 41.179688 91.792969 91.792969zm0 0" />
                    </svg>
                </button>
            </div>
            <div class="main-content">
                <div class="side-window">
                    <div class="user-side-window-info">
                        <span id="user-email">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <g>
                                        <polygon points="339.392,258.624 512,367.744 512,144.896   " />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <polygon points="0,144.896 0,367.744 172.608,258.624   " />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M480,80H32C16.032,80,3.36,91.904,0.96,107.232L256,275.264l255.04-168.032C508.64,91.904,495.968,80,480,80z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M310.08,277.952l-45.28,29.824c-2.688,1.76-5.728,2.624-8.8,2.624c-3.072,0-6.112-0.864-8.8-2.624l-45.28-29.856    L1.024,404.992C3.488,420.192,16.096,432,32,432h448c15.904,0,28.512-11.808,30.976-27.008L310.08,277.952z" />
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            <?php
                            echo "<h4>$userEmail</h4>";
                            ?>
                        </span>
                        <span id="post-count">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-11 0 460 460.11908">
                                <path d="m204.636719 0h-3.378907c-13.730468 0-25.351562 11.054688-25.351562 24.785156v23.875l-72.027344-20.976562c-2.023437-.589844-4.199218-.347656-6.039062.675781-1.84375 1.027344-3.195313 2.746094-3.761719 4.777344l-93.714844 322.976562c-1.203125 4.253907 1.25 8.683594 5.496094 9.914063l322.988281 93.773437c4.226563 1.230469 8.65625-1.183593 9.917969-5.402343l10-34.398438h80.941406c4.476563-.03125 8.113281-3.625 8.199219-8.101562v-336.316407c0-4.417969-3.78125-7.582031-8.199219-7.582031h-188.175781l-11.625-3.898438v-39.316406c0-13.730468-11.539062-24.785156-25.269531-24.785156zm-12.730469 24.785156c0-4.90625 4.441406-8.785156 9.351562-8.785156h3.378907c4.910156 0 9.269531 3.878906 9.269531 8.785156v34.667969l-22-6.148437zm161.507812 379.214844 68.492188-235.332031v235.332031zm68.492188-320v35.890625l-125.265625-35.890625zm-6.78125 50.589844-89.402344 307.609375-307.660156-89.304688 89.46875-307.617187 106.375 30.835937v54.585938c0 4.972656-4.03125 9-9 9-4.972656 0-9-4.027344-9-9v-33.238281c0-4.417969-3.582031-8-8-8s-8 3.582031-8 8v33.238281c0 13.808593 11.191406 25 25 25 13.804688 0 25-11.191407 25-25v-49.9375zm0 0" />
                            </svg>
                            <?php
                            $result2 = mysqli_query($conn, "SELECT count(usersId) AS countPost FROM post WHERE usersId = '$userID'");
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<h4>$row2[countPost] posts</h4>";
                            }
                            ?>
                        </span>
                        <span id="reply-count">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 60.016 60.016" style="enable-background:new 0 0 60.016 60.016;" xml:space="preserve">
                                <path d="M42.008,0h-24c-9.925,0-18,8.075-18,18v14c0,9.59,7.538,17.452,17,17.973v8.344c0,0.937,0.764,1.699,1.703,1.699  c0.449,0,0.874-0.178,1.195-0.499l1.876-1.876C26.708,52.714,33.259,50,40.227,50h1.781c9.925,0,18-8.075,18-18V18  C60.008,8.075,51.933,0,42.008,0z M17.008,29c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S19.213,29,17.008,29z M30.008,29  c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4S32.213,29,30.008,29z M43.008,29c-2.206,0-4-1.794-4-4s1.794-4,4-4s4,1.794,4,4  S45.213,29,43.008,29z" />
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            <?php
                            $result3 = mysqli_query($conn, "SELECT count(usersId) AS countReply FROM reply WHERE usersId = '$userID'");
                            while ($row3 = $result3->fetch_assoc()) {
                                echo "<h4>$row3[countReply] replies</h4>";
                            }
                            ?>
                        </span>
                        <span id="user-role">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-42 0 512 512.002">
                                <path d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0" />
                                <path d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0" />
                            </svg>
                            <?php
                            $formattedUserRole = ucfirst($userRole);
                            echo "<h4>$formattedUserRole</h4>";
                            ?>
                        </span>
                    </div>
                </div>
                <div class="content">
                    <?php include "../retrivePostListByUser.php" ?>
                </div>
                <div class="edit-account-window">
                    <a id='back'>
                        <svg id='back-help' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 15' style='transform: rotate(-90deg);'>
                            <path d='M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z' />
                        </svg>
                        <h5>Back</h5>
                    </a>
                    <h2>Account setting</h2>
                    <h3>Change your basic account details across the website</h3>
                    <form class="edit-account-content" method="POST">
                        <?php
                        echo "
                        <div class='firstname'>
                            <label for='first_name'>First Name</label>
                            <input type='text' name='first_name' value='$userFirstName'>
                        </div>
                        <div class='lastname'>
                            <label for='last_name'>Last Name</label>
                            <input type='text' name='last_name' value='$userLastName'>
                        </div>
                        <div class='emailaddress'>
                            <label for='email'>Email Address</label>
                            <input type='email' name='email_address' value = '$userEmail' disabled style='background-color: rgb(206, 206, 206);'>
                        </div>
                        <div class='password'>
                            <label for='password'>Password</label>
                            <input type='password' name='password'>
                        </div>
                        <div class='confirmpassword'>
                            <label for='confirm_password'>Confirm Password</label>
                            <input type='password' name='confirm_password'>
                        </div>
                        <div class='showPassword'>
                            <input id='showPassword_chkbox' type='checkbox' name='showPassword' value='show' onclick='testing()'><label for='showPassword'>Show Password</label>
                        </div>
                        ";
                        ?>
                        <script>
                            var value = 0;

                            function testing() {
                                var password = document.querySelector('.password input')
                                var confirmPassword = document.querySelector('.confirmpassword input')
                                if (value == 0) {
                                    password.type = 'text';
                                    confirmPassword.type = 'text';
                                    value += 1;
                                } else if (value == 1) {
                                    password.type = 'password';
                                    confirmPassword.type = 'password';
                                    value -= 1;
                                }
                            }
                        </script>
                        <button id='submit-btn' type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        var editAccount = document.getElementById("edit-account-btn")
        var setting = document.querySelector("#setting-button svg");
        var backButton = document.getElementById("back")
        var editWindow = document.querySelector('.edit-account-window')
        var postContent = document.querySelector('.content')
        var settingIndex = 0;
        setting.addEventListener('click', () => {
            //animation
            setting.style.animation = "settingOpen 0.2s linear"
            postContent.style.animation = "hide 0.2s linear"
            editWindow.style.animation = "revealMenu 0.2s linear"
            //
            editWindow.style.left = "14.583333333333333333vw"
            postContent.style.top = "1000px"
            setting.style.fill = "grey"
        })
        back.addEventListener('click', () => {
            editWindow.style.left = "59.89583333333333333333333vw"
            setting.style.fill = "#3a4473";
            postContent.style.top = "0px"
            //animation
            postContent.style.animation = "show 0.2s linear"
            setting.style.animation = "settingClose 0.2s linear"
            editWindow.style.animation = "hideMenu 0.2s linear"
        })
    </script>
    <!-- Edit Account Input Validation -->
    <script>
        submitButton = document.getElementById('submit-btn')
        inputs = document.querySelectorAll('.edit-account-content input')
        inputs.forEach(input => {
            input.addEventListener('keyup', validateInput)
        });

        function validateInput() {
            inputs = document.querySelectorAll('.edit-account-content input')
            var inputLengths = []
            var counter = 0;
            inputs.forEach(input => {
                inputLengths[counter] = input.value.length;
                if (counter < 5) {
                    counter += 1;
                }
            })
            if (inputLengths[0] > 0 && inputLengths[1] > 0 && inputLengths[2] > 0 && inputLengths[3] > 0 && inputLengths[4] > 0) {
                if (inputLengths[3] == inputLengths[4]) {
                    submitButton.style.display = "block";
                } else {
                    submitButton.style.display = "none";
                }
            } else {
                submitButton.style.display = "none";
            }
        };
    </script>
    <script>
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        function delete_cookie(name, path, domain) {
            if (getCookie(name)) {
                document.cookie = name + "=" + ((path) ? ";path=" + path : "") + ((domain) ?
                    ";domain=" + domain : "") + ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
            }
        }
        $('#submit-btn').click(function(e) {
            var Fname = $('input[name ="first_name"]').val();
            var Lname = $('input[name ="last_name"]').val();
            var Email = $('input[name ="email_address"]').val();
            var password = $('input[name ="confirm_password"]').val();
            $.ajax({
                type: "POST",
                url: "updateAccount.php",
                data: {
                    firstName: Fname,
                    lastName: Lname,
                    email: Email,
                    password: password
                }
            });
        });
        $(document).ready(function() {
            var cookie = getCookie("updateAccount")
            if (cookie == "yes") {
                $('.successmessage').css({
                    animation: 'slidedown 5s cubic-bezier(0, 1, 0, 1)',
                });
                $('.successmessage').append("<h6>Account details updated successfully</h6>");
                delete_cookie("updateAccount", "/", "localhost");
            }
        });
    </script>
</body>

</html>
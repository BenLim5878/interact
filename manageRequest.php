<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/adminPage.css">
    <link rel="stylesheet" href="/styles/manageRequest.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="shortcut icon" type="image/png" href='/materials/logo/logo-transparent.png'>
    <title>Admin</title>
</head>

<body>
    <header>
        <?php include './include/header3.php'; ?>
    </header>
    <main>
        <div class="wrapper">
            <?php include './include/adminSideMenu.php'; ?>
            <div class="page-content">
                <h2>Support</h2>
                <div class="content-windows">
                    <div class="search-request">
                        <input id='search-field' type="text" placeholder="Search request...">
                    </div>
                    <div class="request-window">
                        <div class="request-list">
                            <?php
                            include './include/dbh.inc.php';
                            $result = mysqli_query($conn, "SELECT * FROM request LEFT JOIN users ON request.user_id = users.usersId ORDER BY dateRequested DESC");
                            while ($row = $result->fetch_assoc()) {
                                $requestTitle = $row['subject'];
                                $requestDate = $row['dateRequested'];
                                $requestUserID = $row['user_id'];
                                $requestName = $row['usersFname'] . ' ' . $row['usersLname'];
                                echo '<div class=requestBasicContent>';
                                echo "<h2>$requestTitle</h2>";
                                echo "<h3>$requestDate</h3>";
                                echo "<h4>User ID: $requestUserID</h4>";
                                echo "<h4>Name: $requestName</h4>";
                                echo "<hr>";
                                echo "<div class='contentDescription'><pre>" . $row['content'] . "</pre></div>";
                                echo "</div>";
                            }
                            ?>
                            <h4 id="noResult">No result found</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Confirm popout box -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Retrieve data into announcement -->
    <script>
        function getAnnouncement() {
            $.ajax({
                type: "GET",
                url: "/include/retrieveAdminAnnouncement.php",
                success: function(response) {
                    $('.admin-announcement').html(response);
                }
            });
        }
        $(document).ready(function() {
            getAnnouncement();
        });
    </script>
    <!-- Show form when clicked -->
    <script>
        $(document).ready(function() {
            $('#addAnnouncement').click(function(e) {
                e.preventDefault();
                $('.page-mask').css({
                    display: 'flex'
                });
            });
        });
    </script>
    <!-- Close Form -->
    <script>
        $(document).ready(function() {
            $('#close-btn').click(function(e) {
                e.preventDefault();
                $('.page-mask').css('display', 'none');
            });
        });
    </script>
    <!-- Side menu effect -->
    <script>
        $(document).ready(function() {
            $('#request-link').addClass('currentPage');
        });
    </script>
    <script>
        $('.admin-side-menu li').hover(function() {
            $(this).addClass('currentPage')
            // Current page 
            $('#request-link').removeClass('currentPage')
        }, function() {
            $(this).removeClass('currentPage')
            // Current page
            $('#request-link').addClass('currentPage')
        });
    </script>
    <!-- Expand window -->
    <script>
        $(document).ready(function() {
            $('.requestBasicContent').click(function() {
                if ($(this).find('.contentDescription').css('display') == 'none') {
                    $(this).find('hr').css('display', 'block')
                    $(this).find('.contentDescription').css('display', 'block')
                    $(this).css({
                        backgroundColor: 'white',
                        maxHeight: '1000px'
                    });
                } else if ($(this).find('.contentDescription').css('display') == 'block') {
                    $(this).find('hr').css('display', 'none')
                    $(this).find('.contentDescription').css('display', 'none')
                    $(this).css({
                        backgroundColor: 'rgb(250, 250, 250)',
                        maxHeight: '100px'
                    });
                }
            });
        })
    </script>
    <!-- Search field -->
    <script>
        $(document).on("keyup", "#search-field", function() {
            var rowCount = 0;
            var target = $(this).val()
            var windows = $('.requestBasicContent');
            $.each(windows, function(i, window) {
                var subject = $(window).find('h2').text().toUpperCase();
                console.log(subject);
                if (subject.includes(target.toUpperCase()) == true) {
                    $(this).css('display', 'block')
                    rowCount += 1
                } else {
                    $(this).css('display', 'none')
                }
            })
            if (rowCount == 0) {
                $('#noResult').css('display', 'block')
            } else {
                $('#noResult').css('display', 'none')
            }
        });
    </script>
</body>

</html>
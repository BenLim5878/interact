<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/interact/styles/adminPage.css">
    <link rel="shortcut icon" type="image/png" href='/interact/materials/logo/logo-transparent.png'>
    <title>Admin</title>
</head>

<body>
    <header>
        <?php include './include/header3.php'; ?>
    </header>
    <main>
        <div class="wrapper">
            <?php include './include/adminSideMenu.php'; ?>
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
                <h6>Announcement Created</h6>
            </div>
            <div class="page-content">
                <h2>Dashboard</h2>
                <div class='page-mask'>
                    <div class="announcement-form">
                        <button id="close-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.26933 329">
                                <g class="vectorColor">
                                    <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0" />
                                </g>
                            </svg>
                        </button>
                        <div class="content">
                            <h1>Add announcement</h1>
                            <textarea name="announcement" id="announcement-input" placeholder="Description here..."></textarea>
                            <button id="submitAnnouncement">
                                <h6>Submit</h6>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="content-windows">
                    <button id="addAnnouncement">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 492 492" style="enable-background:new 0 0 492 492;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M465.064,207.566l0.028,0H284.436V27.25c0-14.84-12.016-27.248-26.856-27.248h-23.116    c-14.836,0-26.904,12.408-26.904,27.248v180.316H26.908c-14.832,0-26.908,12-26.908,26.844v23.248    c0,14.832,12.072,26.78,26.908,26.78h180.656v180.968c0,14.832,12.064,26.592,26.904,26.592h23.116    c14.84,0,26.856-11.764,26.856-26.592V284.438h180.624c14.84,0,26.936-11.952,26.936-26.78V234.41    C492,219.566,479.904,207.566,465.064,207.566z" />
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
                    </button>
                    <div class="admin-announcement"></div>
                    <div class="admin-summary">
                        <h3>Summary</h3>
                        <div class="summary-info">
                            <?php
                            include './include/dbh.inc.php';
                            $result = mysqli_query($conn, "SELECT count(usersId) AS totalUsers FROM users WHERE role != 'admin'");
                            while ($row = $result->fetch_assoc()) {
                                $count = $row['totalUsers'];
                                echo "<h4>Registered Users: </h4>";
                                echo "<h5> $count </h5>";
                            }
                            $result = mysqli_query($conn, "SELECT count(usersId) AS totalModerators FROM users WHERE role = 'moderator'");
                            while ($row = $result->fetch_assoc()) {
                                $count = $row['totalModerators'];
                                echo "<h4>Moderator: </h4>";
                                echo "<h5> $count </h5>";
                            }
                            $result = mysqli_query($conn, "SELECT count(post_id) AS totalPosts FROM post");
                            while ($row = $result->fetch_assoc()) {
                                $count = $row['totalPosts'];
                                echo "<h4>Thread and post:</h4>";
                                echo "<h5> $count </h5>";
                            }
                            $result = mysqli_query($conn, "SELECT count(reply_id) AS totalReplies FROM reply");
                            while ($row = $result->fetch_assoc()) {
                                $count = $row['totalReplies'];
                                echo "<h4>Reply:</h4>";
                                echo "<h5> $count </h5>";
                            }
                            ?>

                        </div>
                    </div>
                    <div class="admin-stats">
                        <?php
                        include './include/chart.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Retrieve data into announcement -->
    <script>
        function getAnnouncement() {
            $.ajax({
                type: "GET",
                url: "/interact/include/retrieveAdminAnnouncement.php",
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
    <!-- Validate announcement input -->
    <script>
        $(document).ready(function() {
            $('#announcement-input').keyup(function(e) {
                if ($(this).val() == '') {
                    $('#submitAnnouncement').css('display', 'none')
                } else {
                    $('#submitAnnouncement').css('display', 'flex')
                }
            });
        });
    </script>
    <!-- Submit announcement -->
    <script>
        $(document).ready(function() {
            $('#submitAnnouncement').click(function(e) {
                $('.successmessage').css('animation', 'none')
                e.preventDefault();
                var content = $('#announcement-input').val();
                $.ajax({
                    type: "GET",
                    url: "/interact/include/submitAnnouncement.php",
                    data: {
                        content: content
                    },
                    success: function(response) {
                        $('#announcement-input').val('');
                        $('.page-mask').css('display', 'none');
                        getAnnouncement();
                        $('.successmessage').css('animation', 'slidedown 3s cubic-bezier(0, 1, 0, 1)')
                    }
                });
            });
        });
    </script>
    <!-- Side menu effect -->
    <script>
        $(document).ready(function() {
            $('#dashboard-link').addClass('currentPage');
        });
    </script>
    <script>
        $('.admin-side-menu li').hover(function() {
            $(this).addClass('currentPage')
            // Current page 
            $('#dashboard-link').removeClass('currentPage')
        }, function() {
            $(this).removeClass('currentPage')
            // Current page
            $('#dashboard-link').addClass('currentPage')
        });
    </script>
</body>

</html>
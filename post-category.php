<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/userPage.css">
    <link rel="stylesheet" href="styles/header2.css">
    <link rel="shortcut icon" type="image/png" href="materials/logo/logo-transparent.png">
    <link rel="stylesheet" href="/styles/quill.css">
</head>

<body>
    <header>
        <?php
        include './include/header2.php'
        ?>
    </header>
    <main>
        <div id="background-color"></div>
        <div id="background">
            <a id="back" href="/category-list.php">
                <div>
                    <svg id="back-help" xmlns="http://www.w3.org/2000/svg" width="16px" height="14px" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(-90deg);">
                        <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#535353" />
                    </svg>
                </div>
                <h5>Back</h5>
            </a>
            <div class="posts-window">
                <?php
                include_once './include/dbh.inc.php';
                $categoryName = htmlspecialchars($_GET["category"]);
                $result = mysqli_query($conn, ("SELECT * FROM category WHERE category_name='$categoryName'"));
                while ($row = $result->fetch_assoc()) {
                    echo "<h1 id='pageTitle'>$categoryName</h1>";
                    echo "<h2 id='titleDesc'>$row[category_desc]</h2>";
                }
                echo "<script> var categoryName = '$categoryName' </script>"
                ?>
            </div>
            <?php include './include/side-content.php'; ?>
        </div>
    </main>
    <!-- Retrieve post list AJAX -->
    <script>
        var postCount = 7
        var functionCount = 0

        function retrievePostList(postCount) {
            $.ajax({
                type: "GET",
                url: '/include/retrivePostListByCategory.php',
                data: {
                    category: categoryName,
                    postCount: postCount
                },
                success: function(response) {
                    $('.posts-window').find('.posts-list').remove()
                    $('.posts-window').find('#emptySpace').remove()
                    $('.posts-window').find('.loader').remove()
                    $('.posts-window').append(response);
                    if ($('#endOfPost').length == 1) {
                        $(window).off('scroll');
                    } else {
                        $('.posts-window').append('<div class="loader"></div><hr id=emptySpace>')
                    }
                    functionCount = 0
                }
            });
        }
        $(document).ready(function() {
            retrievePostList(postCount)
        });
        $(window).scroll(function() {
            scrollPos = $(document).scrollTop()
            if ($(window).scrollTop() >= $(document).height() - $(window).height() - 150) {
                if (functionCount == 0) {
                    setTimeout(
                        function() {
                            postCount += 7
                            retrievePostList(postCount)
                            $(document).scrollTop(scrollPos)
                        }, 500);
                }
                functionCount += 1
            }
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules and Regulations</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="/interact/materials/logo/logo-transparent.png">
    <link rel="stylesheet" href="/interact/styles/rules-regulations/template.css">
    <link rel="stylesheet" href="/interact/styles/header.css">
    <link rel="stylesheet" href="/interact/styles/footer.css">
</head>

<body onload="textArea()">
    <div class="wrapper">
        <?php include '../../include/header.php>'; ?>
        <!-- Path links -->
        <div id="pathway-links">
            <a href="/interact/help.php" id="help-back">Help</a>
            <div>
                <svg id="back-help" xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(90deg);">
                    <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                </svg>
            </div>
            <a href="/interact/about.php" id="rules-back">About</a>
        </div>
        <div class="seperator">
            <div class="side-menu">
                <h5>Articles in this section</h5>
                <div class="side-menu-links">
                    <a href="threadsPosts1.php">Why aren't my posts showing up?</a>
                    <a href="threadsPosts2.php">How do I submit a picture/photo/comic to Interact?</a>
                    <a id="current-link" href="threadsPosts3.php">How to create poll?</a>
                    <a href="threadsPosts4.php">What is spam?</a>
                </div>
            </div>
            <div class="inner-wrapper">
                <!-- Content -->
                <div class="help-contentsBox">
                    <div class="main-header">
                        <h1 class="title">How to create poll?</h1>
                        <h4 class="data-posted">
                            <?php
                            // Variables
                            $category = "Threads & Posts";
                            $ID = "28";
                            $data = 'datePosted';
                            $currentDate = date("l jS \of F Y h:i:s A");
                            $diff = abs(strtotime($data) - strtotime($currentDate));
                            $years = floor($diff / (365 * 60 * 60 * 24));
                            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));;
                            // Include
                            include '../../include/dbRetriveAbout.php';
                            ?>
                        </h4>
                    </div>
                    <article class="help-contents">
                        <!-- Textarea -->
                        <textarea name="" id="actual-content" cols="30" rows="11" readonly>
<?php
// Variables
$category = "Threads & Posts";
$ID = "28";
$data = 'content';
// Include
include '../../include/dbRetriveAbout.php';
?>
                        </textarea>
                        <!-- End of textarea -->
                    </article>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include '../../include/footer.php'; ?>
    </footer>
    <script>
        function textArea() {
            var textarea = document.querySelector('.help-contents textarea');
            textarea.style.height = `${textarea.scrollHeight}px`
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules and Regulation</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/rules.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="shortcut icon" type="image/png" href="materials/logo/logo-transparent.png">
</head>

<body>
    <div class="wrapper">
        <Header>
            <?php include 'include/header.php'; ?>
        </Header>
        <div class="inner-wrapper" style='margin-bottom:133px'>
            <a href="help.php" id="help-back">
                <div>
                    <svg id="back-help" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(-90deg);">
                        <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                    </svg>
                </div>
                <h5>Help</h5>
            </a>
            <div class="rulesRegulation-content">
                <div id="title">
                    <h1>Account Settings</h1>
                    <h3>Logging in, changing details</h3>
                </div>
                <!-- Frequently Asked Questions (FAQ) -->
                <button id="faq">
                    <h2>Frequently Asked Questions (FAQ)</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="faq-expand">
                    <a href="/archive/account/FAQ1.php">How to update/edit my profile?</a>
                    <a href="/archive/account/FAQ2.php">How to delete my account?</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php include './include/footer.php' ?>
    </footer>
    <script>
        document.querySelectorAll('.rulesRegulation-content button').forEach(element => {
            var clickedExpand = 0;
            element.addEventListener('click', function() {
                if (clickedExpand == 0) {
                    clickedExpand += 1;
                    element.style.marginBottom = '0px';
                    document.getElementById(element.id + '-expand').style.display = 'flex';
                    document.querySelector('#' + element.id + ' svg').style.transform = 'rotate(0deg)';
                } else if (clickedExpand == 1) {
                    clickedExpand -= 1;
                    element.style.marginBottom = '20px';
                    document.getElementById(element.id + '-expand').style.display = 'none';
                    document.querySelector('#' + element.id + ' svg').style.transform = 'rotate(180deg)';
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.landingpage-header').css('animation', 'none')
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.landingpage-header').css("animation", "none")
        });
    </script>
</body>

</html>
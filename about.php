<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
        <div class="inner-wrapper">
            <a href="help.php" id="help-back">
                <div>
                    <svg id="back-help" xmlns="http://www.w3.org/2000/svg" width="26" height="13" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(-90deg);">
                        <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                    </svg>
                </div>
                <h5>Help</h5>
            </a>
            <div class="rulesRegulation-content">
                <div id="title">
                    <h1>What is Interact?</h1>
                    <h3>How it works, history and general questions.</h3>
                </div>
                <!-- About us -->
                <button id="about">
                    <h2>About us</h2>
                    <div>
                        <svg id="testing" xmlns="http://www.w3.org/2000/svg" width="26" height="13" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="about-expand">
                    <a href="/archive/about/aboutUs1.php">What is Interact?</a>
                    <a href="/archive/about/aboutUs2.php">Our Team</a>
                </div>
                <!-- How it works -->
                <button id="howWorks">
                    <h2>How it works?</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="13" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="howWorks-expand">
                    <a href="/archive/about/howItWorks1.php">Getting started with Interact</a>
                    <a href="/archive/about/howItWorks2.php">Access to APSpace</a>
                    <a href="/archive/about/howItWorks3.php">What can I do with Interact?</a>
                </div>
                <!-- Threads & Posts -->
                <button id="threadsPosts">
                    <h2>Threads & Posts</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="13" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="threadsPosts-expand">
                    <a href="/archive/about/threadsPosts1.php">Why aren't my posts showing up?</a>
                    <a href="/archive/about/threadsPosts2.php">How do I submit a picture/photo/comic to Interact?</a>
                    <a href="/archive/about/threadsPosts3.php">How to create poll?</a>
                    <a href="/archive/about/threadsPosts4.php">What is spam?</a>
                </div>
                <!-- How safe is Interact -->
                <button id="safeInteract">
                    <h2>How safe is Interact?</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="13" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="safeInteract-expand">
                    <a href="/archive/about/safeInteract1.php">Is Interact safe?</a>
                    <a href="/archive/about/safeInteract2.php">What’s your privacy policy?</a>
                    <a href="/archive/about/safeInteract3.php">How do i make complaint?</a>
                    <a href="/archive/about/safeInteract4.php">I may be the victim of a fraud or scam</a>
                </div>
                <!-- Frequently Asked Questions (FAQ) -->
                <button id="faq">
                    <h2>Frequently Asked Questions (FAQ)</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="13" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="faq-expand">
                    <a href="/archive/about/FAQ1.php">How can I submit a feedback or report a bug?</a>
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
            $('.landingpage-header').css("animation", "none")
        });
    </script>
</body>

</html>
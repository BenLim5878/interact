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
        <div class="inner-wrapper">
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
                    <h1>Rules & Regulation</h1>
                    <h3>Guidelines & instructions within the forum.</h3>
                </div>
                <!-- Guideline -->
                <button id="guideline">
                    <h2>Guidelines</h2>
                    <div>
                        <svg id="testing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="guideline-expand">
                    <a href="/interact/archive/rules-regulations/guideline1.php">Posting & Commenting</a>
                    <a href="/interact/archive/rules-regulations/guideline2.php">Promotion</a>
                    <a href="/interact/archive/rules-regulations/guideline3.php">Be Nice, Be Respectful</a>
                </div>
                <!-- Instruction -->
                <button id="instruction">
                    <h2>Instructions</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="instruction-expand">
                    <a href="/interact/archive/rules-regulations/instruction1.php">Register an account</a>
                    <a href="/interact/archive/rules-regulations/instruction2.php">Log In</a>
                    <a href="/interact/archive/rules-regulations/instruction3.php">Create a post</a>
                    <a href="/interact/archive/rules-regulations/instruction4.php">How can I delete a post?</a>
                    <a href="/interact/archive/rules-regulations/instruction5.php">Edit account details</a>
                    <a href="/interact/archive/rules-regulations/instruction6.php">Logout from Interact</a>
                </div>
                <!-- Policy -->
                <button id="policy">
                    <h2>Policies</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="policy-expand">
                    <a href="/interact/archive/rules-regulations/policy1.php">What are the rules?</a>
                    <a href="/interact/archive/rules-regulations/policy2.php">Restriction on violent content</a>
                    <a href="/interact/archive/rules-regulations/policy3.php">Is posting someone's private or personal information okay?</a>
                    <a href="/interact/archive/rules-regulations/policy4.php">Legal Restriction on Content</a>
                    <a href="/interact/archive/rules-regulations/policy5.php">Pornography and sex-related content restriction</a>
                </div>
                <!-- Role -->
                <button id="role">
                    <h2>Roles</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="role-expand">
                    <a href="/interact/archive/rules-regulations/role1.php">Member</a>
                    <a href="/interact/archive/rules-regulations/role2.php">What is moderator?</a>
                </div>
                <!-- Copyright -->
                <button id="copyright">
                    <h2>Copyright at Interact</h2>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="#EF6C35" style="transform: rotate(180deg);">
                            <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#EF6C35" />
                        </svg>
                    </div>
                </button>
                <div id="copyright-expand">
                    <a href="/interact/archive/rules-regulations/copyright1.php">Copyright at Interact</a>
                    <a href="/interact/archive/rules-regulations/copyright2.php">What types of works does copyright protect?</a>
                    <a href="/interact/archive/rules-regulations/copyright3.php">How to report an unauthorized copy of work on Interact</a>
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
                    element.style.marginBottom = '1.04166666666666vw';
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
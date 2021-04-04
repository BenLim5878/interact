<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <title>Help - Interact</title>
    <link rel="stylesheet" href="styles/help.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="shortcut icon" type="image/png" href="materials/logo/logo-transparent.png">
</head>

<body>
    <header>
        <div class="wrapper">
            <?php include './include/header.php'; ?>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div id="helpPage-title">
                <h2>Hi, how can we help?</h2>
                <div id="searchBar">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667    S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6    c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z     M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z" />
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
                    <form action="include/search.inc.php" method="post" autocomplete="off">
                        <input type="text" name="search" placeholder="Search for FAQ">
                        <button type="submit" style='display:none' name="submit-search">Search</button>
                    </form>
                </div>
            </div>
            <img src="materials/5235.jpg" alt="interact">
            <div id="personalSupport">
                <div id="line-deco"></div>
                <h3>Log in for personalized support</h3>
                <a href="/interact/login.php" id="logIn">
                    <h4>Log In</h4>
                </a>
                <div id="line-deco"></div>
            </div>
            <div id="relatedTopics">
                <h2>Related Topics</h2>
                <div class="topics">
                    <a id="topic" href="about.php">
                        <div id="topic-image"></div>
                        <div id="topic-content">
                            <h3>What is Interact?</h3>
                            <h4>How it works, history and general questions.</h4>
                        </div>
                    </a>
                    <a id="topic" href="accountSetting.php">
                        <div id="topic-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                                <path d="M24 4C12.95 4 4 12.95 4 24C4 35.05 12.95 44 24 44C35.05 44 44 35.05 44 24C44 12.95 35.05 4 24 4ZM26 34H22V22H26V34ZM26 18H22V14H26V18Z" fill="#EF6C35" />
                            </svg>
                        </div>
                        <div id="topic-content">
                            <h3>Account Settings</h3>
                            <h4>Logging in, changing details</h4>
                        </div>
                    </a>
                    <a id="topic" href="rules.php">
                        <div id="topic-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none">
                                <path d="M20 0C8.95 0 0 8.95 0 20C0 31.05 8.95 40 20 40C31.05 40 40 31.05 40 20C40 8.95 31.05 0 20 0ZM20 6C23.31 6 26 8.69 26 12C26 15.32 23.31 18 20 18C16.69 18 14 15.32 14 12C14 8.69 16.69 6 20 6ZM20 34.4C14.99 34.4 10.59 31.84 8 27.96C8.05 23.99 16.01 21.8 20 21.8C23.99 21.8 31.94 23.99 32 27.96C29.41 31.84 25.01 34.4 20 34.4Z" fill="#EF6C35" />
                            </svg>
                        </div>
                        <div id="topic-content">
                            <h3>Rules & Regulations</h3>
                            <h4>Guidelines & instructions within the forum.</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include './include/footer.php' ?>
    </footer>
</body>

</html>
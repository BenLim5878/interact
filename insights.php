<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/adminPage.css">
    <link rel="stylesheet" href="/styles/insights.css">
    <link rel="shortcut icon" type="image/png" href='/materials/logo/logo-transparent.png'>
    <title>Insights</title>
</head>

<body>
    <header>
        <?php include './include/header3.php'; ?>
    </header>
    <main>
        <div class="wrapper">
            <?php include './include/adminSideMenu.php'; ?>
            <div class="page-content">
                <h2>Insights</h2>
                <div class="content-windows">
                    <?php
                    include './include/insights-chart.php';
                    ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Side menu effect -->
    <script>
        $(document).ready(function() {
            $('#insights-link').addClass('currentPage');
        });
    </script>
    <script>
        $('.admin-side-menu li').hover(function() {
            $(this).addClass('currentPage')
            // Current page 
            $('#insights-link').removeClass('currentPage')
        }, function() {
            $(this).removeClass('currentPage')
            // Current page
            $('#insights-link').addClass('currentPage')
        });
    </script>
</body>

</html>
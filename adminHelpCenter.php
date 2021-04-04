<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/interact/styles/adminPage.css">
    <link rel="stylesheet" href="/interact/styles/adminHelpCenter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="shortcut icon" type="image/png" href='/interact/materials/logo/logo-transparent.png'>
    <title>Help Center</title>
</head>

<body>
    <header>
        <?php include './include/header3.php'; ?>
    </header>
    <main>
        <div class="wrapper">
            <?php include './include/adminSideMenu.php'; ?>
            <div class="page-content">
                <h2>Help Center</h2>
                <div class="content-windows">
                    <div class="categories">
                        <div class="generalInfo">
                            <i class="fas fa-border-all"></i>
                            <h3>General Information</h3>
                            <h4>How it works, history and general questions.</h4>
                        </div>
                        <div class="accountSetting">
                            <i class="fas fa-user-circle"></i>
                            <h3>Account Setting</h3>
                            <h4>Logging in, changing details</h4>
                        </div>
                        <div class="rulesRegulations">
                            <i class="fas fa-file-alt"></i>
                            <h3>Rules & Regulations</h3>
                            <h4>Guidelines & instructions within the forum.</h4>
                        </div>
                    </div>
                    <hr>
                    <div class="categories-content">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Side menu effect -->
    <script>
        $(document).ready(function() {
            $('#helpCenter-link').addClass('currentPage');
        });
    </script>
    <script>
        $('.admin-side-menu li').hover(function() {
            $(this).addClass('currentPage')
            // Current page 
            $('#helpCenter-link').removeClass('currentPage')
        }, function() {
            $(this).removeClass('currentPage')
            // Current page
            $('#helpCenter-link').addClass('currentPage')
        });
    </script>
    <!-- category click -->
    <script>
        function retrieveCategory(type) {
            $.ajax({
                type: "GET",
                url: "/interact/include/retrieveCategoryType.php",
                data: {
                    type: type
                },
                success: function(response) {
                    $('.categories-content').html(response)
                }
            });
        }

        $('.categories div').click(function(e) {
            $(this).css('backgroundColor', 'rgb(212, 212, 212)')
            $(this).siblings().css('backgroundColor', 'rgb(250, 250, 250)')
            $('hr').css('display', 'block')
            categoryTitle = $(this).find('h3').text();
            if (categoryTitle == "General Information") {
                retrieveCategory('general');
            } else if (categoryTitle == "Account Setting") {
                retrieveCategory('account');
            } else if (categoryTitle == "Rules & Regulations") {
                retrieveCategory('regulation');
            }
        })
    </script>
    <!-- Confirm popout box -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Show form -->
    <script>
        $(document).on("click", ".titleButton button", function() {
            var header = $(this).text()
            var res = encodeURIComponent(header);
            $.confirm({
                icon: 'fas fa-edit',
                title: '<h3 class=popout-title>Update content</h3>',
                content: `url:/interact/include/retrieveAllRules.php?header=${res}`,
                draggable: false,
                onContentReady: function() {
                    textArea();
                },
                buttons: {
                    cancel: {
                        function() {}
                    },
                    update: {
                        action: function() {
                            updateContent(header);
                        },
                        btnClass: 'btn-green',
                    }
                }
            })
        })

        function textArea() {
            var textarea = document.querySelector('#contentDescription');
            textarea.style.height = `${textarea.scrollHeight}px`
        }

        function updateContent(header) {
            var updateTitle = $('input[name=title]').val()
            var updateContent = $('#contentDescription').val()
            $.ajax({
                type: "GET",
                url: "/interact/include/updateRulesRegulations.php",
                data: {
                    prevTitle: header,
                    title: updateTitle,
                    content: updateContent
                },
                success: function(response) {
                    retrieveCategory(response)
                    $.alert({
                        icon: 'fas fa-check-circle',
                        title: '<h3 class=popout-title>Updated sucessfully<h3>',
                        content: '<h4 class=popout-content>Changes has been saved into database</h4>'
                    });
                }
            });
        }
    </script>
</body>

</html>
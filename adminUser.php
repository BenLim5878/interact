<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/interact/styles/adminPage.css">
    <link rel="stylesheet" href="/interact/styles/adminUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="shortcut icon" type="image/png" href='/interact/materials/logo/logo-transparent.png'>
    <script defer src="https://kit.fontawesome.com/bf5d00c84d.js" crossorigin="anonymous"></script>
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
                <h2>User records</h2>
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
                    <div id="admin-searchBar">
                        <div class="admin-searchBar-title">
                            <h3>Search</h3>
                        </div>
                        <input id='search-field' type="text">
                    </div>
                    <div class="tableContainer">
                        <table class="table">
                            <thead>
                                <th></th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                            </thead>
                            <tbody class="tableBody">
                            </tbody>
                        </table>
                    </div>
                    <div class="actionButtons" id="promoteUser">
                        <button class='actionButton'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                                <path d="M14.5 0L6.5 11H12V17H17V11H22.5L14.5 0Z" fill="#15D579" />
                                <path d="M16 19H13C12.45 19 12 19.45 12 20C12 20.55 12.45 21 13 21H16C16.55 21 17 20.55 17 20C17 19.45 16.55 19 16 19Z" fill="#15D579" />
                                <path d="M16 23H13C12.45 23 12 23.45 12 24C12 24.55 12.45 25 13 25H16C16.55 25 17 24.55 17 24C17 23.45 16.55 23 16 23Z" fill="#15D579" />
                                <path d="M16 27.0001H13C12.45 27.0001 12 27.4501 12 28.0001C12 28.5501 12.45 29.0001 13 29.0001H16C16.55 29.0001 17 28.5501 17 28.0001C17 27.4501 16.55 27.0001 16 27.0001Z" fill="#15D579" />
                            </svg>
                            <h4>Promote...</h4>
                        </button>
                        <button class="actionButton" id="demoteUser">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 29" fill="none">
                                <path d="M8.50002 29L16.5 18H11L11 12L6.00002 12L6.00002 18L0.500044 18L8.50002 29Z" fill="#B0AFAA" />
                                <path d="M6.99998 10H10C10.55 10 11 9.54999 11 9.00001C11 8.45003 10.55 8.00002 10 8.00002H6.99998C6.45 8.00002 5.99999 8.45003 5.99999 9.00001C5.99999 9.54999 6.45 10 6.99998 10Z" fill="#B0AFAA" />
                                <path d="M6.99998 6L10 6C10.55 6 11 5.54999 11 5.00001C11 4.45003 10.55 4.00002 10 4.00002L6.99998 4.00002C6.45 4.00002 5.99999 4.45003 5.99999 5.00001C5.99999 5.54999 6.45 6 6.99998 6Z" fill="#B0AFAA" />
                                <path d="M6.99998 1.99988L10 1.99988C10.55 1.99988 11 1.54987 11 0.999887C11 0.449907 10.55 -0.000103116 10 -0.000103116L6.99998 -0.000103116C6.45 -0.000103116 5.99999 0.449907 5.99999 0.999887C5.99999 1.54992 6.45 1.99988 6.99998 1.99988Z" fill="#B0AFAA" />
                            </svg>
                            <h4>Demote...</h4>
                        </button>
                        <button class="actionButton" id="banUser">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 439.963 439.963" style="enable-background:new 0 0 439.963 439.963;fill:red" xml:space="preserve">
                                <g>
                                    <path d="M421.836,134.33c-11.611-27.121-27.172-50.487-46.686-70.089c-19.502-19.604-42.824-35.215-69.948-46.825   C278.088,5.806,249.674,0,219.985,0c-29.692,0-58.101,5.809-85.224,17.416c-27.124,11.61-50.441,27.218-69.949,46.825   C45.303,83.843,29.74,107.209,18.13,134.33C6.521,161.453,0.715,189.958,0.715,219.838c0,29.881,5.806,58.432,17.415,85.648   c11.613,27.223,27.172,50.627,46.682,70.236c19.508,19.605,42.825,35.217,69.949,46.818c27.123,11.615,55.531,17.422,85.224,17.422   c29.693,0,58.103-5.807,85.217-17.422c27.124-11.607,50.446-27.213,69.948-46.818c19.514-19.609,35.074-43.014,46.686-70.236   c11.611-27.217,17.412-55.768,17.412-85.648C439.244,189.958,433.447,161.453,421.836,134.33z M90.078,305.198   c-16.94-26.066-25.41-54.532-25.406-85.364c0-28.167,6.949-54.243,20.843-78.227c13.891-23.982,32.738-42.919,56.527-56.818   c23.791-13.894,49.772-20.839,77.943-20.839c31.411,0,59.952,8.661,85.652,25.981L90.078,305.198z M363.013,280.511   c-8.187,19.318-19.219,35.927-33.113,49.823c-13.9,13.895-30.409,24.982-49.539,33.254c-19.13,8.277-39.259,12.422-60.382,12.422   c-30.452,0-58.717-8.466-84.794-25.413l215.273-214.985c16.566,25.505,24.838,53.581,24.838,84.223   C375.291,240.965,371.198,261.187,363.013,280.511z" />
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
                            <h4>Ban...</h4>
                        </button>
                        <button class="actionButton" id="unbanUser">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 439.963 439.963" style="enable-background:new 0 0 439.963 439.963;fill:green" xml:space="preserve">
                                <g>
                                    <path d="M421.836,134.33c-11.611-27.121-27.172-50.487-46.686-70.089c-19.502-19.604-42.824-35.215-69.948-46.825   C278.088,5.806,249.674,0,219.985,0c-29.692,0-58.101,5.809-85.224,17.416c-27.124,11.61-50.441,27.218-69.949,46.825   C45.303,83.843,29.74,107.209,18.13,134.33C6.521,161.453,0.715,189.958,0.715,219.838c0,29.881,5.806,58.432,17.415,85.648   c11.613,27.223,27.172,50.627,46.682,70.236c19.508,19.605,42.825,35.217,69.949,46.818c27.123,11.615,55.531,17.422,85.224,17.422   c29.693,0,58.103-5.807,85.217-17.422c27.124-11.607,50.446-27.213,69.948-46.818c19.514-19.609,35.074-43.014,46.686-70.236   c11.611-27.217,17.412-55.768,17.412-85.648C439.244,189.958,433.447,161.453,421.836,134.33z M90.078,305.198   c-16.94-26.066-25.41-54.532-25.406-85.364c0-28.167,6.949-54.243,20.843-78.227c13.891-23.982,32.738-42.919,56.527-56.818   c23.791-13.894,49.772-20.839,77.943-20.839c31.411,0,59.952,8.661,85.652,25.981L90.078,305.198z M363.013,280.511   c-8.187,19.318-19.219,35.927-33.113,49.823c-13.9,13.895-30.409,24.982-49.539,33.254c-19.13,8.277-39.259,12.422-60.382,12.422   c-30.452,0-58.717-8.466-84.794-25.413l215.273-214.985c16.566,25.505,24.838,53.581,24.838,84.223   C375.291,240.965,371.198,261.187,363.013,280.511z" />
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
                            <h4>Unban...</h4>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Side menu effect -->
    <script>
        $(document).ready(function() {
            $('#user-link').addClass('currentPage');
        });
    </script>
    <script>
        $('.admin-side-menu li').hover(function() {
            $(this).addClass('currentPage')
            // Current page 
            $('#user-link').removeClass('currentPage')
        }, function() {
            $(this).removeClass('currentPage')
            // Current page
            $('#user-link').addClass('currentPage')
        });
    </script>
    <!-- retrieve user data -->
    <script>
        $(document).ready(function() {
            loadData()
        });

        function loadData() {
            $.ajax({
                type: "GET",
                url: "/interact/include/retrieveUserData.php",
                success: function(response) {
                    $('.tableBody').html(response);
                }
            });
        }
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
    <!-- Select table rows -->
    <script>
        var row = [];
        var index = 0;
        $(document).on("change", "input[name='highlight']", function() {
            var parent = $(this).parent().parent();
            if ($(this).is(":checked")) {
                parent.css('backgroundColor', '#E3E3E3');
                row.push($(this).val());
                $('.actionButtons').css('display', 'flex');
                $('.tableContainer').css('maxHeight', '29.53125vw')

            } else if ($(this).is(":not(:checked)")) {
                parent.css('backgroundColor', 'transparent');
                row.pop($(this).val());
                if (row.length == 0) {
                    $('.actionButtons').css('display', 'none');
                    $('.tableContainer').css('maxHeight', '31.77083333333vw')
                }
            }
        })
    </script>
    <!-- Filter name -->
    <script>
        var emptyCount = 0;
        $('#search-field').keyup(function(e) {
            filterList();
        });

        function filterList(noResult) {
            var rowCount = 0;
            var searchField = $('#search-field')
            var userList = $('.dataRows');
            $.each(userList, function(i, user) {
                var fName = $(user).find(".fName").text().toUpperCase();
                var lname = $(user).find(".lName").text().toUpperCase();
                var email = $(user).find(".email").text().toUpperCase();
                var role = $(user).find(".role").text().toUpperCase();
                var status = $(user).find(".status").text().toUpperCase();
                if (fName.includes(searchField.val().toUpperCase()) == true || lname.includes(searchField.val().toUpperCase()) == true || email.includes(searchField.val().toUpperCase()) == true || role.includes(searchField.val().toUpperCase()) == true || status.includes(searchField.val().toUpperCase()) == true) {
                    $(user).css("display", "table-row", "important")
                    rowCount += 1;
                } else {
                    $(user).css("display", "none")
                }
            })
            if (rowCount == 0) {
                if (emptyCount == 0) {
                    $('.tableBody').append('<tr id=noRowResult><td></td><td></td><td></td><td class=email>No keyword matched in database</td><td></td><td></td></tr>')
                    emptyCount += 1;
                }
            } else {
                $('#noRowResult').remove();
                emptyCount = 0;
            }
        }
    </script>
    <!-- Confirm popout box -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        function successUpdate() {
            loadData()
            row = []
            $('.actionButtons').css('display', 'none');
            $('.tableContainer').css('maxHeight', '31.77083333333vw')
            $.alert({
                icon: 'fas fa-check-circle',
                title: '<h3 class=popout-title>Updated sucessfully<h3>',
                content: '<h4 class=popout-content>Changes has been saved into database</h4>'
            });
            $('#search-field').val('');
            emptyCount = 0;
        }

        function prepareAjax(rowDesc, type) {
            $.ajax({
                type: "GET",
                url: "/interact/include/manageUserAction.php",
                data: {
                    row: row,
                    role: rowDesc,
                    changeType: type
                },
                success: function(response) {
                    successUpdate();
                }
            });
        }

        $(document).ready(function() {
            $('.actionButton').click(function(e) {
                e.preventDefault();
                var functionType = $(this).find('h4').text();
                console.log(functionType);
                $.confirm({
                    icon: 'fas fa-exclamation-triangle',
                    title: '<h3 class=popout-title>You are about to make some changes into the database</h3>',
                    content: '<h4 class=popout-content>Are you sure you want to continue?</h4>',
                    draggable: false,
                    buttons: {
                        cancel: {
                            function() {

                            }
                        },
                        proceed: {
                            action: function() {
                                if (functionType == 'Promote...') {
                                    prepareAjax("moderator", "role")
                                } else if (functionType == 'Demote...') {
                                    prepareAjax("member", "role")
                                } else if (functionType == 'Ban...') {
                                    prepareAjax("banned", "account_status")
                                } else if (functionType == 'Unban...') {
                                    prepareAjax("active", "account_status")
                                }
                            },
                            btnClass: 'btn-red',
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
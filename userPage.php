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
    <noscript>
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
            <div class="messageBox">
                <i class="fas fa-check-circle"></i>
                <h5></h5>
            </div>
            <div class="posts-window">
                <div id="richTextBox">
                    <div id="editor"></div>
                    <div id="bottomBar">
                        <a href="./include/post/new.php" onclick="createCookie(),deleteCookie()">
                            <svg fill=white xmlns="http://www.w3.org/2000/svg" id="bold" enable-background="new 0 0 24 24" height="0.9375vw" viewBox="0 0 24 24" width="0.9375vw">
                                <path d="m24 17.5v.75c0 .2-.08.39-.22.53l-5 5c-.14.14-.33.22-.53.22h-.75v-5.75c0-.41.34-.75.75-.75z" />
                                <path d="m21.25 5h-7.5v2.25c0 .965-.785 1.75-1.75 1.75s-1.75-.785-1.75-1.75v-2.25h-7.5c-1.52 0-2.75 1.23-2.75 2.75v13.5c0 1.52 1.23 2.75 2.75 2.75h13.75v-5.75c0-.965.785-1.75 1.75-1.75h5.75v-8.75c0-1.52-1.23-2.75-2.75-2.75zm-7.25 14.5h-9.25c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h9.25c.414 0 .75.336.75.75s-.336.75-.75.75zm5.25-4h-14.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h14.5c.414 0 .75.336.75.75s-.336.75-.75.75zm0-4h-14.5c-.414 0-.75-.336-.75-.75s.336-.75.75-.75h14.5c.414 0 .75.336.75.75s-.336.75-.75.75z" />
                                <path d="m12 8c-.414 0-.75-.336-.75-.75v-3.75c0-.414.336-.75.75-.75s.75.336.75.75v3.75c0 .414-.336.75-.75.75z" />
                                <path d="m12 4c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z" />
                            </svg>
                            <h5>Next</h5>
                        </a>
                    </div>
                </div>
                <div id="homepage-deco"></div>
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
                url: './include/retrivePostList.php',
                data: {
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
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://unpkg.com/quill-image-uploader@1.2.1/dist/quill.imageUploader.min.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const toolbarOptions = [
            [{
                header: [1, 2, 3, false]
            }],
            [{
                    color: []
                },
                {
                    background: []
                }
            ],
            ["bold", "italic", "underline", "strike"],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            ["link", "image", "code", "video"]
        ];
        var FontAttributor = Quill.import('attributors/class/font');
        let Link = Quill.import('formats/link');
        class CustomLink extends Link {
            static sanitize(url) {
                let value = super.sanitize(url);
                if (value) {
                    for (let i = 0; i < CustomLink.PROTOCOL_WHITELIST.length; i++)
                        if (value.startsWith(CustomLink.PROTOCOL_WHITELIST[i]))
                            return value;
                    return `http://${value}`
                }
                return value;
            }
        }
        Quill.register(CustomLink);
        FontAttributor.whitelist = [
            'Open Sans'
        ];
        Quill.register(FontAttributor, true);
        Quill.register("modules/imageUploader", ImageUploader);
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Write something here...',
            modules: {
                toolbar: toolbarOptions,
                imageUploader: {
                    upload: file => {
                        return new Promise((resolve, reject) => {
                            const formData = new FormData();
                            formData.append("image", file);

                            fetch(
                                    "https://api.imgbb.com/1/upload?key=3338a627d859e76f9ec25554d6b38388", {
                                        method: "POST",
                                        body: formData
                                    }
                                )
                                .then(response => response.json())
                                .then(result => {
                                    console.log(result);
                                    resolve(result.data.url);
                                })
                                .catch(error => {
                                    reject("Upload failed");
                                    console.error("Error:", error);
                                });
                        });
                    }
                },
            }
        });
    </script>
    <script>
        // format for textbox expansion
        var textBox = document.querySelector('#richTextBox')
        for (const child of textBox.children) {
            child.addEventListener('focusin', () => {
                var toolbar = document.querySelector('.ql-toolbar.ql-snow')
                toolbar.style.setProperty("overflow", "visible", "important");
                toolbar.style.setProperty("max-height", "100px", "important");
                toolbar.style.setProperty("padding", "8px", "important");
                toolbar.style.setProperty("border-bottom", "1px solid #ccc", "important");
                document.querySelector('#bottomBar').style.setProperty("display", "block", "important")
                var editor = document.querySelector('#richTextBox')
                editor.style.setProperty("overflow", "visible", "important");
                editor.style.setProperty("max-height", "685px", "important");
            })
        }
        for (const child of textBox.children) {
            child.addEventListener("focusout", () => {
                var toolbar = document.querySelector('.ql-toolbar.ql-snow')
                toolbar.style.setProperty("overflow", "hidden", "important");
                toolbar.style.setProperty("max-height", "0px", "important");
                toolbar.style.setProperty("padding", "0px", "important");
                toolbar.style.setProperty("border-bottom", "0px", "important");
                document.querySelector('#bottomBar').style.setProperty("display", "block", "important")
                var editor = document.querySelector('#richTextBox')
                editor.style.setProperty("overflow", "hidden", "important");
                editor.style.setProperty("max-height", "100px", "important");
            })
        };
    </script>
    <script>
        document.querySelector('.ql-editor').addEventListener('keyup', checkcontent);
        var link = document.querySelector('#bottomBar a')

        function checkcontent() {
            var length = quill.getText().trim().length
            console.log(length);
            if (length == 0) {
                link.style.display = "none"
            } else {
                link.style.display = "flex"
            }
        }
    </script>
    <script>
        function createCookie() {
            var quillHtml = quill.root.innerHTML.trim();
            localStorage.setItem("savedText", quillHtml);
        }

        function deleteCookie() {
            var storageItem = getCookie("newPost")
            delete_cookie("newPost", "/", "");

            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function delete_cookie(name, path, domain) {
                if (getCookie(name)) {
                    document.cookie = name + "=" +
                        ((path) ? ";path=" + path : "") +
                        ((domain) ? ";domain=" + domain : "") +
                        ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
                }
            }
        }
    </script>
    <script>
        function delete_cookie(name, path, domain) {
            if (getCookie(name)) {
                document.cookie = name + "=" +
                    ((path) ? ";path=" + path : "") +
                    ((domain) ? ";domain=" + domain : "") +
                    ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
            }
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        $(document).ready(function() {
            if (getCookie('submittedRequest')) {
                $('.messageBox').css('display', 'flex')
                $('.messageBox').find('h5').text("Request submitted successfully")
                delete_cookie('submittedRequest', "/", "");
                setTimeout(() => {
                    $('.messageBox').css('transform', 'translateY(-200px)')
                }, 5000);
                setTimeout(() => {
                    $('.messageBox').css('display', 'none')
                }, 7000);
            } else if (getCookie('deletedPost')) {
                $('.messageBox').css('display', 'flex')
                $('.messageBox').find('h5').text("Post deleted successfully")
                delete_cookie('deletedPost', "/", "");
                setTimeout(() => {
                    $('.messageBox').css('transform', 'translateY(-200px)')
                }, 5000);
                setTimeout(() => {
                    $('.messageBox').css('display', 'none')
                }, 7000);
            }
        });
    </script>
</body>

</html>
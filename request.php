<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" type="image/png" href="/interact/materials/logo/logo-transparent.png">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/interact/styles/quill.css">
    <link rel="stylesheet" href="/interact/styles/header2.css">
    <link rel="stylesheet" href="/interact/styles/userRequest.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Request</title>
</head>

<body>
    <header>
        <?php include 'include/header2.php' ?>
    </header>
    <main>
        <div class="content-window">
            <div class="title">
                <h1>Support</h1>
                <h2>Please include your subject and detailed description in the help request. For more information, please visit <a style='color:#EF6C35;' id="rulesLink">Rules & Regulations</a> and <a style='color:#EF6C35;' id="accountSettingLink">Account Setting</a></h2>
            </div>
            <form method="GET" autocomplete="off">
                <div class="subject">
                    <h3>Subject:</h3>
                    <input id='subject' type="text" placeholder="Subject">
                </div>
                <div id="editor"></div>
                <button id='submit-btn' type="submit">Submit</button>
            </form>
        </div>
    </main>
    <script>
        $('#submit-btn').click(function(e) {
            e.preventDefault();
            var subject = $('#subject').val();
            var content = quill.root.innerHTML.trim();
            $.ajax({
                type: 'GET',
                url: '/interact/include/submitRequest.php',
                data: {
                    subject: subject,
                    content: content
                }
            });
            window.location.href = "http://localhost/interact/userPage.php"
        });
    </script>
    <script>
        $(document).ready(function() {

            submitButton = document.getElementById('submit-btn')
            document.querySelector('.ql-editor').addEventListener('keyup', () => {
                validateInput();
            })
            inputs = document.querySelectorAll('form input')
            inputs.forEach(input => {
                input.addEventListener('keyup', validateInput)
            });

            function validateInput() {
                inputs = document.querySelectorAll('form input')
                var inputLengths = []
                var counter = 0;
                var length = quill.getText().trim().length;
                var subjectLength = $('#subject').val().length;
                if (subjectLength > 0 && length > 0) {
                    submitButton.style.display = "block";
                } else {
                    submitButton.style.display = "none";
                }
            };
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
    <!-- Open new link -->
    <script>
        $(document).ready(function() {
            $('#rulesLink').click(function(e) {
                e.preventDefault();
                window.open('/interact/rules.php')
            });
            $('#accountSettingLink').click(function(e) {
                e.preventDefault();
                window.open('/interact/accountSetting.php')
            });
        });
    </script>
</body>

</html>
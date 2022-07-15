<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" type="image/png" href="/materials/logo/logo-transparent.png">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/header2.css">
    <link rel="stylesheet" href="/styles/quill.css">
    <link rel="stylesheet" href="/styles/newPost.css">
    <title>Edit post</title>
    <?php
    ob_start();
    if (isset($_COOKIE['newEditPost'])) {
        header("Location: /userPage.php");
        exit();
        setcookie("newEditPost", "", time() - 3600, "/");
    }
    ?>
</head>

<body onload="setContent(),checkCategoryCount()">
    <header>
        <?php
        include '../header2.php'
        ?>
    </header>
    <?php
    include '../dbh.inc.php';
    $id = htmlspecialchars($_GET["id"]);
    $ownerID = '';
    $result = mysqli_query($conn, "SELECT * FROM post WHERE ref_ID ='$id'");
    while ($row = $result->fetch_assoc()) {
        $ownerID = $row['usersId'];
    }
    if ($ownerID != $_SESSION['userid']) {
        header("Location: /include/post/showPost.php?id=$id");
        exit();
    }
    ?>
    <main>
        <div class="newPost-window">
            <?php
            $id = htmlspecialchars($_GET["id"]);
            echo "<a id='back' href='/include/post/showPost.php?id=$id'>"
            ?>
            <div>
                <svg id="back-help" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 15" fill="white" style="transform: rotate(-90deg);">
                    <path d="M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z" fill="#535353" />
                </svg>
            </div>
            <h5>Back</h5>
            </a>
            <div class="bottom-box">
                <div class="input-window">
                    <div class="input-field">
                        <input type="text" placeholder="Title" id="post-title" onkeyup="enableSubmit()" maxlength="65" value="<?php
                                                                                                                                include '../dbh.inc.php';
                                                                                                                                $query =  "SELECT * FROM post WHERE ref_ID ='$id'";
                                                                                                                                $result = mysqli_query($conn, $query);
                                                                                                                                while ($row = $result->fetch_assoc()) {
                                                                                                                                    echo $row['title'];
                                                                                                                                    $content = $row['description'];
                                                                                                                                }
                                                                                                                                ?>">
                        <div id="richTextBox">
                            <div id="editor"></div>
                        </div>
                    </div>
                    <div class="input-sideMenu">
                        <div id="category-input">
                            <h4>Category</h4>
                            <span>
                                <button id="choose-category">
                                    choose category
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;" xml:space="preserve">
                                        <g>
                                            <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744   L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284   c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z" />
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
                                </button>
                                <div class="dropdown-content">
                                    <button onclick="addTags('Health',this)">Health</button>
                                    <button onclick="addTags('Sport',this)">Sport</button>
                                    <button onclick=" addTags('Study',this)">Study</button>
                                    <button onclick="addTags('Financial',this)">Financial</button>
                                    <button onclick="addTags('Entertainment',this)">Entertainment</button>
                                </div>
                            </span>
                        </div>
                        <div id="tags-list">
                            <?php
                            include '../dbh.inc.php';
                            $categoryCount = 0;
                            $id = htmlspecialchars($_GET["id"]);
                            $query =  "SELECT * FROM post WHERE ref_ID ='$id'";
                            $result = mysqli_query($conn, $query);
                            while ($row = $result->fetch_assoc()) {
                                $postid = $row['post_id'];
                                $query2 = "SELECT table1.category_name FROM post INNER JOIN( SELECT category.category_id, postcategory.post_id, category_name FROM category INNER JOIN postcategory ON category.category_id = postcategory.category_id ) AS table1 ON post.post_id = table1.post_id WHERE table1.post_id='$postid'";
                                $result2 = mysqli_query($conn, $query2);
                                $length = mysqli_num_rows($result2);
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    echo "<button onclick='removeButton(this)'>";
                                    echo "<img src='/materials/close.png' style='width: 0.67708333vw; height: 0.67708333vw; margin: 0.26041667vw 0.52083333vw 0px;'>";
                                    echo "<h6>";
                                    echo $row2['category_name'];
                                    echo "</h6>";
                                    echo "</button>";
                                }
                            }
                            ?>
                        </div>
                        <div id="type-input">
                            <h4>Type</h4>
                            <span>
                                <button id="choose-type">
                                    choose type
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;" xml:space="preserve">
                                        <g>
                                            <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744   L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284   c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z" />
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
                                </button>
                                <div class="dropdown-content2">
                                    <button onclick="addTags2('Discussion',this)">Discussion</button>
                                    <button onclick="addTags2('Question',this)">Question</button>
                                </div>
                                <div id="type-tag">
                                    <?php
                                    include '../dbh.inc.php';
                                    $typeCount = 0;
                                    $id = htmlspecialchars($_GET["id"]);
                                    $query =  "SELECT * FROM post WHERE ref_ID ='$id'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<button onclick='removeButton2(this)'>";
                                        echo "<img src='/materials/close.png' style='width: 0.67708333vw; height: 0.67708333vw; margin: 0.26041667vw 0.52083333vw 0px;'>";
                                        echo "<h6>";
                                        echo $row['type'];
                                        echo "</h6>";
                                        echo "</button>";
                                    }
                                    ?>
                                </div>
                            </span>
                        </div>
                        <form id="post-form" action="../updatePost.php?id=<?php echo htmlspecialchars($_GET["id"]); ?>" method="post">
                            <button type="submit" disabled name="postSubmit" id="post-button" href="#" onclick="createCookie()">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
                <div class="side-content">
                    <div id="needHelp">
                        <h4>Need Help?</h4>
                        <h5>Visit our <a href="#">Help Center</a> to find more information more about posting</h5>
                    </div>
                    <div id="tipsPosting">
                        <h4>Tips on getting response quickly</h4>
                        <ul>
                            <li>
                                <h6>Make sure your topic is unique</h6>
                            </li>
                            <li>
                                <h6>Double-check grammar and spelling</h6>
                            </li>
                            <li>
                                <h6>Describe your details concisely</h6>
                            </li>
                            <li>
                                <h6>Choose the right category</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include '../dbh.inc.php';
    $query =  "SELECT * FROM post WHERE ref_ID ='$id'";
    $result = mysqli_query($conn, $query);
    while ($row = $result->fetch_assoc()) {
        echo "<script>";
        echo "function setContent() {
            quill.root.innerHTML =";
        $content = str_replace(array('"', "'"), array('\"', "\'"), $row['description']);
        echo "'$content'";
        echo "}";
        echo "</script>";
    }
    ?>
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
            }, {
                background: []
            }],
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
            placeholder: '',
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
        // Changes from new //
        function checkCategoryCount() {
            num = document.querySelector('#tags-list').childElementCount;
            typenum = document.querySelector('#type-tag').childElementCount;
            var buttons = document.querySelectorAll('#tags-list button');
            var lists = document.querySelectorAll('.dropdown-content button');
            buttons.forEach(button => {
                lists.forEach(list => {
                    if (button.innerText == list.innerText) {
                        list.remove();
                    }
                });
            });
            if (num == 3) {
                const chooseCategory = document.querySelector('#choose-category');
                chooseCategory.removeEventListener('click', expandWindow);
            }
            if (typenum == 1) {
                const chooseType = document.querySelector('#choose-type');
                chooseType.removeEventListener('click', expandWindow2);
            }
            return [num, typenum];
        }
        elementArray = checkCategoryCount();
        count = elementArray[0];
        count2 = elementArray[1];

        function removeButton(element) {
            element.remove();
            count -= 1;
            enableSubmit();
            addButton(element.innerText);
            if (count == 2) {
                document.querySelector('#choose-category').addEventListener('click', expandWindow)
            }
        }

        function removeButton2(element) {
            element.remove();
            count2 -= 1;
            enableSubmit();
            document.querySelector('#choose-type').addEventListener('click', expandWindow2)
        }
        var index = 0;
        var index2 = 0;
        const category = document.querySelector('#choose-category')
        category.addEventListener('click', expandWindow)
        document.querySelector('#choose-type').addEventListener('click', expandWindow2)

        function expandWindow() {
            if (index == 0) {
                document.querySelector('.dropdown-content').style.display = "block"
                index += 1;
                if (index2 == 1) {
                    document.querySelector('.dropdown-content2').style.display = "none"
                    index2 -= 1;
                }
            } else if (index == 1) {
                document.querySelector('.dropdown-content').style.display = "none"
                index -= 1;
            }
        }

        function expandWindow2() {
            if (index2 == 0) {
                document.querySelector('.dropdown-content2').style.display = "block"
                if (index == 1) {
                    document.querySelector('.dropdown-content').style.display = "none"
                    index -= 1;
                }
                index2 += 1;
            } else if (index2 == 1) {
                document.querySelector('.dropdown-content2').style.display = "none"
                index2 -= 1;
            }
        }

        function addTags(tagname, element) {
            if (count <= 3) {
                element.remove();
                const closeButton = document.createElement("img");
                closeButton.src = '/materials/close.png';
                closeButton.style.width = "0.67708333vw";
                closeButton.style.height = "0.67708333vw";
                closeButton.style.margin = "0.26041667vw 0.52083333vw 0px 0.52083333vw"
                let div = document.createElement("BUTTON");
                div.addEventListener('click', () => {
                    div.remove();
                    count -= 1;
                    enableSubmit();
                    addButton(tagname)
                    if (count == 2) {
                        document.querySelector('#choose-category').addEventListener('click', expandWindow)
                    }
                })
                let name = document.createTextNode(tagname);
                let h6 = document.createElement('H6')
                h6.appendChild(name);
                div.appendChild(closeButton)
                div.appendChild(h6)
                document.getElementById('tags-list').appendChild(div);
                enableSubmit();
                document.querySelector('.dropdown-content').style.display = "none";
                index -= 1;
                count += 1;
                if (count == 3) {
                    const chooseCategory = document.querySelector('#choose-category');
                    chooseCategory.removeEventListener('click', expandWindow);

                }
            }
        }

        function addTags2(tagname, element) {
            if (count2 < 1) {
                element.remove();
                const closeButton = document.createElement("img");
                closeButton.src = '/materials/close.png';
                closeButton.style.width = "0.67708333vw";
                closeButton.style.height = "0.67708333vw";
                closeButton.style.margin = "0.26041667vw 0.52083333vw 0px 0.52083333vw"
                let div = document.createElement("BUTTON");
                div.addEventListener('click', () => {
                    div.remove();
                    count2 -= 1;
                    enableSubmit();
                    addButton2(tagname)
                    if (count2 == 0) {
                        document.querySelector('#choose-type').addEventListener('click', expandWindow2)
                    }
                })
                let name = document.createTextNode(tagname);
                let h6 = document.createElement('H6')
                h6.appendChild(name);
                div.appendChild(closeButton)
                div.appendChild(h6)
                document.getElementById('type-tag').appendChild(div);
                enableSubmit();
                document.querySelector('.dropdown-content2').style.display = "none";
                index2 -= 1;
                count2 += 1;
                if (count2 == 1) {
                    const chooseType = document.querySelector('#choose-type');
                    chooseType.removeEventListener('click', expandWindow2);

                }
            }
        }


        function addButton(text) {
            const button = document.createElement("Button");
            const buttonText = document.createTextNode(text)
            button.appendChild(buttonText)
            document.querySelector('.dropdown-content').appendChild(button);
            button.addEventListener('click', () => {
                addTags(text, button);
            })
        }

        function addButton2(text) {
            const button = document.createElement("Button");
            const buttonText = document.createTextNode(text)
            button.appendChild(buttonText)
            document.querySelector('.dropdown-content2').appendChild(button);
            button.addEventListener('click', () => {
                addTags2(text, button);
            })
        }
    </script>
    <script>
        // create cookie
        function createCookie() {
            var category = [];
            var quillHtml = quill.root.innerHTML.trim();
            var title = document.querySelector('#post-title').value;
            var categorylist = document.querySelector('#tags-list').childElementCount;
            for (let index = 0; index < categorylist; index++) {
                category[index] = document.querySelector('#tags-list').children[index].innerText;
            }
            var type = document.querySelector('#type-tag').children[0].innerText;
            var expires = 1;
            var content = {
                title: title,
                content: quillHtml,
                category: category,
                type: type
            };
            if (1) {
                var date = new Date();
                date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            };
            document.cookie = 'form' + "=" + encodeURIComponent(JSON.stringify(content)) + expires + "; path=/";
            console.log(encodeURIComponent(JSON.stringify(content)));
        }
    </script>
    <script>
        var inputTitle = document.getElementById('post-title');
        var inputCategory = document.getElementById('tags-list');
        var inputType = document.getElementById('type-input');
        var value = inputTitle.value.trim();
        document.querySelector('.ql-editor').addEventListener('keyup', () => {
            enableSubmit();
        })

        function enableSubmit() {
            var postButton = document.querySelector('#post-button')
            var inputTitle = document.getElementById('post-title');
            var inputCategory = document.getElementById('tags-list').childElementCount;
            var inputType = document.getElementById('type-tag').childElementCount;
            var value = inputTitle.value.trim();
            var length = quill.getText().trim().length;
            if (value.length >= 1 && length >= 1 && inputCategory >= 1 && inputType == 1) {
                postButton.style.backgroundColor = "green";
                postButton.disabled = false;
                postButton.classList.add("post-button-hover")
            } else {
                postButton.style.backgroundColor = "grey";
                postButton.disabled = true;
                postButton.classList.remove("post-button-hover")
            }

        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/header2.css">
    <link rel="shortcut icon" type="image/png" href="materials/logo/logo-transparent.png">
    <link rel="stylesheet" href="/interact/styles/post-category.css">
    <title>Category List</title>
</head>

<body>
    <header>
        <?php
        include 'include/header2.php'
        ?>
    </header>
    <main>
        <div class="content-window">
            <div class="search-category">
                <input id='search-field' type="text" placeholder="Search category...">
            </div>
            <div class="category-list">
                <?php
                include_once './include/dbh.inc.php';
                $categoryList = mysqli_query($conn, "SELECT * FROM category");
                while ($row = $categoryList->fetch_assoc()) {
                    $categoryName = $row['category_name'];
                    $categoryDesc = $row['category_desc'];
                    echo "<a href='/interact/post-category.php?category=$categoryName' class='categoryCard' id='$categoryName'>";
                    echo "<h3>$categoryName</h3>";
                    echo "</a>";
                }
                echo "<h3 id='noResult'> No result found </h3>"
                ?>
            </div>
        </div>
    </main>
    <script>
        document.getElementById('search-field').addEventListener('keyup', filterCategory)

        function filterCategory() {
            var searchField = document.getElementById('search-field')
            var categoryList = document.querySelectorAll('.categoryCard')
            var index = 0;
            categoryList.forEach(category => {
                var title = category.innerText.toUpperCase()
                if (title.includes(searchField.value.toUpperCase()) == true) {
                    index -= 1;
                    category.style.animation = "showUp 0.5s ease"
                    category.style.display = "block";
                } else {
                    category.style.display = "none";
                    index += 1;
                }
                if (index == categoryList.length) {
                    document.getElementById('noResult').style.display = "block";
                } else {
                    document.getElementById('noResult').style.display = "none";
                }
            })
        }
    </script>
</body>

</html>
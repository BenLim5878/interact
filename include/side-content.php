<div class="side-content">
    <div class="top-categories">
        <h2>Top categories</h2>
        <div class="categories-list">
            <?php
            include 'dbh.inc.php';
            $countCategory = "SELECT category.category_name,postcategory.category_id,count(postcategory.category_id) AS number FROM `postcategory` RIGHT JOIN category ON postcategory.category_id = category.category_id GROUP BY postcategory.category_id ORDER BY count(postcategory.category_id) DESC LIMIT 4";
            $result = mysqli_query($conn, $countCategory);
            echo $conn->error;
            while ($row = $result->fetch_assoc()) {
                $categoryName = $row['category_name'];
                echo "<a href='/interact/post-category.php?category=$categoryName' id='categoryBox'>";
                echo "<h3> $row[category_name]</h3>";
                $count = "$row[number]";
                if ($count >= 1) {
                    if ($count == 1) {
                        echo "<h4>$count post</h4>";
                    } else {
                        echo "<h4>$count posts</h4>";
                    }
                }
                echo "</a>";
            }
            ?>
        </div>
    </div>
    <div class="trendingPost">
        <h2>Trending now</h2>
        <div class="trending-list">
            <?php
            include 'dbh.inc.php';
            $categoryName = '';
            if (isset($_GET["category"])) {
                $categoryName = htmlspecialchars($_GET["category"]);
            }
            $topPosts = "SELECT * FROM `post` ORDER BY views DESC LIMIT 10";
            $result = mysqli_query($conn, $topPosts);
            echo $conn->error;
            while ($row = $result->fetch_assoc()) {
                echo "<a href='/interact/include/post/showPost.php?id=$row[ref_ID]&origin=$categoryName' id='postBox'>";
                echo "<h2> $row[title] </h2>";
                $views = "$row[views]";
                if ($views >= 1) {
                    if ($views == 1) {
                        echo "<h3>$views view</h3>";
                    } else {
                        echo "<h3>$views views</h3>";
                    }
                }
                echo "</a>";
            }
            ?>
        </div>
    </div>
</div>
<?php
include 'dbh.inc.php';
$categoryName = htmlspecialchars($_GET["category"]);
$postCount = $_GET['postCount'];
$index = 0;
$query =  "SELECT * FROM post LEFT JOIN ( SELECT post_id,postcategory.category_id,category.category_name FROM postcategory LEFT JOIN category ON postcategory.category_id = category.category_id ) AS categoryList ON categoryList.post_id = post.post_id WHERE category_name = '$categoryName' ORDER BY timePosted DESC LIMIT $postCount";
$result = mysqli_query($conn, $query);
$rowCount = mysqli_num_rows($result);
while ($row = $result->fetch_assoc()) {
    echo "<div class='posts-list'>";
    echo "<h5>" . $row['type'] . "</h5>";
    echo "<a href='include/post/showPost.php?id=" . $row['ref_ID'] . "&origin=$categoryName'>";
    echo "<h2>" . $row['title'] . "</h2>";
    echo "</a>";
    echo "<div id='homepage-deco'></div>";
    echo "<div class='contentDescription'><pre>" . $row['description'] . "</pre></div>";
    echo "<div class='bot-content'>";
    $categoryID = $row['category_id'];
    $allRows = mysqli_query($conn, "SELECT * FROM postcategory WHERE category_id='$categoryID'");
    $totalRows = mysqli_num_rows($allRows);
    //Category
    echo "<h4>";
    $id = $row['post_id'];
    $index = 0;
    $query2 = "SELECT test.category_name FROM post INNER JOIN( SELECT category.category_id, postcategory.post_id, category_name FROM category INNER JOIN postcategory ON category.category_id = postcategory.category_id ) AS test ON post.post_id = test.post_id WHERE post.post_id='$id'";
    $result2 = mysqli_query($conn, $query2);
    $length = mysqli_num_rows($result2);
    while ($row2 = mysqli_fetch_array($result2)) {
        if ($index ==  $length - 1) {
            echo $row2['category_name'];
        } else {
            echo $row2['category_name'] . " | ";
            $index += 1;
        }
    }
    echo "</h4>";
    //Category
    echo "<a class='readMore' href='include/post/showPost.php?id=" . $row['ref_ID'] . "&origin=$categoryName'><h6>More...</h6></a>";
    echo "<h5>" . $row['views'] . " views" . "</h5>";
    echo "</div>";
    echo "</div>";
}
if ($rowCount == $totalRows) {
    echo "<hr id=emptySpace><h4 id=endOfPost>End of posts list</h4><hr id=emptySpace>";
}

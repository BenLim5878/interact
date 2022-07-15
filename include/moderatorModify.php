<link rel="stylesheet" href="/styles/moderatorModify.css">
<?php
include 'dbh.inc.php';
$categoryCount = 0;
$id = htmlspecialchars($_GET["id"]);
$query =  "SELECT * FROM post WHERE ref_ID ='$id'";
$result = mysqli_query($conn, $query);
$response = '';
$response .= '<div class=listOfCategories>';
$categoryName = array();
$index = 0;
$count = 0;
$response .= ' <div class=search-category>
<input id=search-field type="text" placeholder="Search category...">
</div>';
$allCategory = mysqli_query($conn, "SELECT * FROM category");
while ($category = $allCategory->fetch_assoc()) {
    $categoryName[$index] = $category['category_name'];
    $index += 1;
}
while ($row = $result->fetch_assoc()) {
    $postid = $row['post_id'];
    $query2 = "SELECT table1.category_name FROM post INNER JOIN( SELECT category.category_id, postcategory.post_id, category_name FROM category INNER JOIN postcategory ON category.category_id = postcategory.category_id ) AS table1 ON post.post_id = table1.post_id WHERE table1.post_id='$postid'";
    $result2 = mysqli_query($conn, $query2);
    $length = mysqli_num_rows($result2);
    while ($row2 = mysqli_fetch_array($result2)) {
        $categoryRetrievedName = $row2['category_name'];
        foreach ($categoryName as $aCategory) {
            if ($aCategory == $categoryRetrievedName) {
                $response .= "<button class='chosenCategory'>";
                $response .= "<img src='/materials/close.png'>";
                $response .= "<h6>";
                $response .= "$categoryRetrievedName";
                $key = array_search("$aCategory", $categoryName);
                unset($categoryName[$key]);
                $response .= "</h6>";
                $response .= "</button>";
            }
        }
    }
}
foreach ($categoryName as $aCategory) {
    $response .= "<button class='categoryList'>";
    $response .= "<h6>";
    $response .= "$aCategory";
    $response .= "</h6>";
    $response .= "</button>";
}
$response .= '<h6 id=noResult>No result found</h6>';
$response .= '</div>';
echo $response;
?>
<!-- Search function -->
<script>
    $(document).on("keyup", "#search-field", function() {
        var rowCount = 0;
        var target = $(this).val()
        var windows = $('.listOfCategories button');
        $.each(windows, function(i, window) {
            var subject = $(window).find('h6').text().toUpperCase();
            if (subject.includes(target.toUpperCase()) == true) {
                $(this).css('display', 'flex')
                rowCount += 1
            } else {
                $(this).css('display', 'none')
            }
        })
        if (rowCount == 0) {
            $('#noResult').css('display', 'block')
        } else {
            $('#noResult').css('display', 'none')
        }
    });
</script>
<script>
    var count = 0;
    $(document).ready(function() {
        count = 0;
        $('.chosenCategory').each(function() {
            count += 1;
        });
    });
    $(document).on('click', '.categoryList', function(e) {
        if (count <= 2) {
            $(this).addClass('chosenCategory');
            $(this).removeClass('categoryList');
            $(this).prepend("<img src='/materials/close.png'>")
            count += 1;
        }
    });
    $(document).on('click', '.chosenCategory', function(e) {
        if (count > 1) {
            count -= 1;
            $(this).addClass('categoryList');
            $(this).removeClass('chosenCategory');
            $(this)
            $(this).find('img').remove();
        }
    })
</script>
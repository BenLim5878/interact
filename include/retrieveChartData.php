<?php
include './dbh.inc.php';
//variables
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = strtotime(date('Y-m-d'));
$dateArray = array();
for ($i = 0; $i < 31; $i++) {
    $newformat = date('Y-m-d', $date);
    $dateArray[$i] = $newformat;
    $date = strtotime('-1 day', $date);
}
$index = 0;
$counter = 0;
$typeIndex = 0;

//queries
$retrieveTotalUser = "SELECT count(usersId) AS totalUsers FROM users WHERE role!='admin'";
$retrieveTotalMember = "SELECT count(usersId) AS totalMember FROM users WHERE role='member'";
$retrieveTotalModerator = "SELECT count(usersId) AS totalModerator FROM users WHERE role='moderator'";
$retrieveTotalPost = "SELECT count(post_id) AS totalPosts FROM post";
$retrieveTotalReply = "SELECT count(reply_id) AS totalReplies FROM reply";
$retrieveTotalType = "SELECT type,COUNT(post_id) AS totalPost FROM post GROUP BY type";

//result
$totalUser = mysqli_query($conn, $retrieveTotalUser);
while ($users = $totalUser->fetch_assoc()) {
    $totalUserData = $users['totalUsers'];
}
$totalMember = mysqli_query($conn, $retrieveTotalMember);
while ($members = $totalMember->fetch_assoc()) {
    $totalMemberData = $members['totalMember'];
}
$totalModerator = mysqli_query($conn, $retrieveTotalModerator);
while ($moderators = $totalModerator->fetch_assoc()) {
    $totalModeratorData = $moderators['totalModerator'];
}
for ($i = 0; $i < 31; $i++) {
    $postsDate = mysqli_query($conn, "SELECT count(post_id) AS postDate FROM post WHERE DATE(timePosted)='$dateArray[$i]'");
    while ($postDate = $postsDate->fetch_assoc()) {
        $post = $postDate['postDate'];
        $numberPostDay[$i] = $post;
    }
    $repliesDate = mysqli_query($conn, "SELECT count(reply_id) AS replyDate FROM reply WHERE DATE(dateReplied)='$dateArray[$i]'");
    while ($replyDate = $repliesDate->fetch_assoc()) {
        $reply = $replyDate['replyDate'];
        $numberReplyDay[$i] = $reply;
    }
}
$categoryList = mysqli_query($conn, "SELECT * FROM category");
while ($categoryRow = $categoryList->fetch_assoc()) {
    $total = 0;
    $categoryID = $categoryRow['category_id'];
    $categoryName = $categoryRow['category_name'];
    $listCategory[$index] = $categoryName;
    $totalCategoryPost = mysqli_query($conn, "SELECT count(post_id) AS totalPost FROM postcategory WHERE category_id='$categoryID'");
    $totalCategoryView = mysqli_query($conn, "SELECT views FROM post LEFT JOIN postcategory ON post.post_id = postcategory.post_id WHERE category_id='$categoryID'");
    while ($categoryPostRow = $totalCategoryPost->fetch_assoc()) {
        $totalPostInCategory[$index] = $categoryPostRow['totalPost'];
        $index += 1;
    }
    while ($categoryViewRow = $totalCategoryView->fetch_assoc()) {
        $int =  (int) $categoryViewRow['views'];
        $total += $int;
    }
    $totalViewInCategory[$counter] = $total;
    $counter += 1;
}
for ($i = 0; $i < 3; $i++) {
    $count = ($i + 1);
    $postCountCategory = mysqli_query($conn, "SELECT count(*) AS total FROM (SELECT post_id, COUNT(*) FROM postcategory GROUP BY post_id HAVING COUNT(*) = '$count') AS postCountCategory");
    while ($postCategory = $postCountCategory->fetch_assoc()) {
        $countPostCategory[$i] = $postCategory['total'];
    }
}
//data processing
$proprotionMember = ($totalMemberData / $totalUserData) * 100;
$proprotionModerator = ($totalModeratorData / $totalUserData) * 100;
//store data's into array
$data = array("proportionMember" => $proprotionMember, "proportionModerator" => $proprotionModerator, "numberPostDay" => $numberPostDay, "datePosted" => $dateArray, "numberReplyDay" => $numberReplyDay, "listCategory" => $listCategory, "totalPostInCategory" => $totalPostInCategory, "countPostCategory" => $countPostCategory, "totalViewInCategory" => $totalViewInCategory);

//encode data into JSON
echo json_encode($data);

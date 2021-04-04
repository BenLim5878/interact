<?php
include './dbh.inc.php';
$data = '';
$type = $_GET['type'];
$result = mysqli_query($conn, "SELECT category FROM rulesregulations WHERE type='$type' GROUP BY category");
while ($row = $result->fetch_assoc()) {
    $category = $row['category'];
    $data .= '<div class=categoryContent><h2 class=categoryTitle>' . $category . '</h2><div class=titleButton>';
    $titles = mysqli_query($conn, "SELECT * FROM rulesregulations WHERE category='$category' AND type='$type'");
    while ($title = $titles->fetch_assoc()) {
        $data .= '<button>' . $title['title'] . '</button>';
    }
    $data .= '</div></div>';
}

echo $data;

<?php
include './dbh.inc.php';
$result = mysqli_query($conn, "SELECT * FROM announcement ORDER BY post_time DESC");
$data = '';
while ($row = $result->fetch_assoc()) {
    $data .= "<div class='announcement-content'>";
    $data .= "<h5>$row[content]</h5>";
    $data .= "<h6>$row[post_time]";
    $data .= "</div>";
}
echo $data;

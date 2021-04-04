<?php
include './dbh.inc.php';
$title = $_GET['title'];
$content = $_GET['content'];
$prevTitle = $_GET['prevTitle'];
$formattedTitle = str_replace(array('"', "'"), array('\"', "\'"), $title);
$formattedContent = str_replace(array('"', "'"), array('\"', "\'"), $content);
$formattedPrevTitle = str_replace(array('"', "'"), array('\"', "\'"), $prevTitle);
mysqli_query($conn, "UPDATE rulesregulations SET title='$formattedTitle',content='$formattedContent' WHERE title='$formattedPrevTitle'");
$result = mysqli_query($conn, "SELECT * FROM rulesregulations WHERE content='$formattedContent'");
while ($row = $result->fetch_assoc()) {
    echo $row['type'];
}

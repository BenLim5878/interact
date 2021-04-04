<?php
include './dbh.inc.php';
$data = '';
$header = $_GET['header'];
$decoded = urldecode($header);
$desc = str_replace(array('"', "'"), array('\"', "\'"), $header);
$result = mysqli_query($conn, "SELECT * FROM rulesregulations WHERE title='$desc'");
while ($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $category = $row['category'];
    $content = $row['content'];
    $data .= '<div class=form><h3 id=title>Title</h3><input disabled type=text name=title value="' . $title . '">';
    $data .= '<h3 id=content>Content</h3><textarea id=contentDescription name=content placeholder="Please enter content">' . $content . '</textarea>';
    $data .= "</div>";
}
echo $data;

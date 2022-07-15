<?php
include './dbh.inc.php';
$query = $_POST["query"];
if (isset($query)) {
    $output = '';
    $query = "SELECT * FROM post WHERE title LIKE '%" . $query . "%' LIMIT 13";
    $result = mysqli_query($conn, $query);
    $output = '<ul class="list-post">';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $href = $row["ref_ID"];
            $output .= "<a href='/include/post/showPost.php?id=$href'><h3>" . $row["title"] . '</h3></a>';
        }
    } else {
        $output .= '<li>No post found </li>';
    }
    $output .= '</ul>';
    echo $output;
}

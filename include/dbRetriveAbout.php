<?php

$serverName = "us-cdbr-east-06.cleardb.net";
$dBUsername = "b8085750c4cb45";
$dBPassword = "741318c2";
$dBName = "heroku_eed5da92befa448";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
$query =  "SELECT * FROM rulesregulations WHERE category = '$category' AND rulesRegulations_ID = '$ID'";
$result = mysqli_query($conn, $query);
if ($data == 'content') {
    while ($row = $result->fetch_assoc()) {
        echo $row[$data];
    }
    mysqli_close($conn);
} else if ($data == 'datePosted') {
    while ($row = $result->fetch_assoc()) {
        $currentDate = date('Y/m/d h:i:s a', time());
        $diff = abs(strtotime($row[$data]) - strtotime($currentDate));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        if ($years > 0) {
            if ($years == 1) {
                echo ('1 year ago');
            } else {
                echo ($years . ' years ago');
            }
        } else if ($months > 0) {
            if ($months == 1) {
                echo ('1 month ago');
            } else {
                echo ($months . ' months ago');
            }
        } else if ($days == 0) {
            echo ('Few hours ago');
        } else {

            echo ($days . ' days ago');
        }
    }
    mysqli_close($conn);
}

<?php
include './dbh.inc.php';

$result = mysqli_query($conn, "SELECT count(usersid) FROM users");
while ($row = $result->fetch_assoc()) {
    echo $row['usersId'];
}

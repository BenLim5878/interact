<?php
include './dbh.inc.php';
$html = '';
$result = mysqli_query($conn, "SELECT * FROM users WHERE role != 'admin'");
while ($row = $result->fetch_assoc()) {
    $html .= "<tr class='dataRows'>";
    $html .= "<td><input type='checkbox' name='highlight' value='$row[usersId]' class='checkBoxSelect'></td>";
    $fName = $row['usersFname'];
    $html .= "<td class='fName'>$fName</td>";
    $lName = $row['usersLname'];
    $html .= "<td class='lName'>$lName</td>";
    $userEmail = $row['usersEmail'];
    $html .= "<td class='email'>$userEmail</td>";
    $role = $row['role'];
    $html .= "<td class='role'>$role</td>";
    $accountStatus = $row['account_status'];
    if ($accountStatus == "active") {
        $html .= "<td class='status' id='activeStatus'>$accountStatus</td>";
    } elseif ($accountStatus == "banned") {
        $html .= "<td class='status' id='bannedStatus'>$accountStatus</td>";
    }
    $html .= "</tr>";
}
echo $html;

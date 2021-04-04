<?php
session_start();
include 'dbh.inc.php';
$query = "SELECT * FROM notification WHERE usersId = '$_SESSION[userid]' ORDER BY date DESC LIMIT 10";
$result = mysqli_query($conn, $query);
$output = '';
$output = '<h2 class=title>Notification</h2><hr>';
if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_array($result)) {
      $output .= '
  <li>
  <a href=' . $row["link"] . '>
  <h4>' . $row["message"] . '</h4>
  <h5>' . $row["date"] . '</h5>
  ';
      if ($row["status"] == "unread") {
         $output .= '<div id=unreadSign></div>';
      }
      $output .= '</a></li>';
   }
} else {
   $output .= '<li><h4>No Notification Found</h4></li>';
}
$status_query = "SELECT * FROM notification WHERE status = 'unread' AND usersId = '$_SESSION[userid]'";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);

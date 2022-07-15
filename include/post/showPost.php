<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" type="image/png" href="/materials/logo/logo-transparent.png">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/styles/showPost.css">
    <link rel="stylesheet" href="/styles/header2.css">
    <link rel="stylesheet" href="/styles/quill.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <title>
        <?php
        include '../dbh.inc.php';
        $id = htmlspecialchars($_GET["id"]);

        $query = "SELECT * FROM post WHERE ref_ID ='$id'";
        $result = mysqli_query($conn, $query);
        while ($row = $result->fetch_assoc()) {
            echo $row['title'];
        }
        ?>
    </title>
</head>

<body onload="delStorage(), createPostValidation()">
    <header>
        <?php
        $id = htmlspecialchars($_GET["id"]);
        include '../dbh.inc.php';
        $query = "SELECT * FROM post WHERE ref_ID ='$id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            header("Location: /userPage.php");
            exit();
        }
        include '../header2.php'
        ?>
    </header>

    <main>
        <div class="contentWindow">
            <div class="successmessage">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M383.841,171.838c-7.881-8.31-21.02-8.676-29.343-0.775L221.987,296.732l-63.204-64.893    c-8.005-8.213-21.13-8.393-29.35-0.387c-8.213,7.998-8.386,21.137-0.388,29.35l77.492,79.561    c4.061,4.172,9.458,6.275,14.869,6.275c5.134,0,10.268-1.896,14.288-5.694l147.373-139.762    C391.383,193.294,391.735,180.155,383.841,171.838z" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M256,470.487    c-118.265,0-214.487-96.214-214.487-214.487c0-118.265,96.221-214.487,214.487-214.487c118.272,0,214.487,96.221,214.487,214.487    C470.487,374.272,374.272,470.487,256,470.487z" />
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                </svg>
            </div>
            <?php
            $origin = '';
            if (isset($_GET["origin"])) {
                $origin = htmlspecialchars($_GET["origin"]);
            }
            if ($origin) {
                echo "
            <a id='back' onclick='history.back()'>
                <div>
                    <svg id='back-help' xmlns='http://www.w3.org/2000/svg' width='0.83333333vw' height='0.72916667vw' viewBox='0 0 24 15' fill='#EF6C35' style='transform: rotate(-90deg);'>
                        <path d='M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z' fill='#535353' />
                    </svg>
                </div>
                <h5>Back</h5>
            </a>";
            } else {
                echo "
                <a id='back' onclick='history.back()'>
                <div>
                    <svg id='back-help' xmlns='http://www.w3.org/2000/svg' width='0.83333333vw' height='0.72916667vw' viewBox='0 0 24 15' fill='#EF6C35' style='transform: rotate(-90deg);'>
                        <path d='M12 0L0 12L2.83 14.83L12 5.66L21.17 14.83L24 12L12 0Z' fill='#535353' />
                    </svg>
                </div>
                <h5>Back</h5>
            </a>";
            }
            ?>
            <div class="post-content">
                <?php
                echo '<script>var sessionRole = "' . $_SESSION['role'] . '"</script>';
                function timeDiff($timeStart, $timeEnd, $class)
                {
                    $duration = abs(strtotime($timeEnd) - strtotime($timeStart));
                    $years = floor($duration / (365 * 60 * 60 * 24));
                    $months = floor(($duration - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                    $days = floor(($duration - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                    $hours = floor(($duration - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
                    $minutes = floor(($duration - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / (60));
                    $seconds = floor(($duration - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60));
                    if ($years >= 1) {
                        if ($years == 1) {
                            echo "<h4 class=$class>A year ago</h4 class=$class>";
                        } else {
                            echo "<h4 class=$class>$years years ago</h4 class=$class>";
                        }
                    } else {
                        if ($months >= 1) {
                            if ($months == 1) {
                                echo "<h4 class=$class>A month ago</h4 class=$class>";
                            } else {
                                echo "<h4 class=$class>$months months ago</h4 class=$class>";
                            }
                        } else {
                            if ($days >= 1) {
                                if ($days == 1) {
                                    echo "<h4 class=$class>A day ago</h4 class=$class>";
                                } else {
                                    echo "<h4 class=$class>$days days ago</h4 class=$class>";
                                }
                            } else {
                                if ($hours >= 1) {
                                    if ($hours == 1) {
                                        echo "<h4 class=$class>An hour ago</h4 class=$class>";
                                    } else {
                                        echo "<h4 class=$class>$hours hours ago</h4 class=$class>";
                                    }
                                } else {
                                    if ($minutes >= 1) {
                                        if ($minutes == 1) {
                                            echo "<h4 class=$class>A minutes ago</h4 class=$class>";
                                        } else {
                                            echo "<h4 class=$class>$minutes minutes ago</h4 class=$class>";
                                        }
                                    } else {
                                        if ($seconds >= 1) {
                                            if ($seconds == 1) {
                                                echo "<h4 class=$class>A second ago</h4 class=$class>";
                                            } else {
                                                echo "<h4 class=$class>$seconds seconds ago</h4 class=$class>";
                                            }
                                        } else {
                                            echo "<h4 class=$class> Just now </h4 class=$class>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                date_default_timezone_set('Asia/Hong_Kong');
                include '../dbh.inc.php';
                $id = htmlspecialchars($_GET["id"]);
                $query = "SELECT * FROM post WHERE ref_ID ='$id'";
                $query3 = "SELECT * FROM (SELECT postreply.reply_id,postreply.post_id,content,dateReplied FROM postreply LEFT JOIN reply ON postreply.reply_id=reply.reply_id) AS test WHERE post_id = (SELECT post_id FROM post WHERE ref_ID='$id')";
                $result = mysqli_query($conn, $query);
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='posts-content'>";
                    echo "<h2 style='overflow: hidden'>" . $row['title'] . "</h2>";
                    //Category
                    echo "<h4>";
                    $postid = $row['post_id'];
                    $index = 0;
                    $query2 = "SELECT table1.category_name FROM post INNER JOIN( SELECT category.category_id, postcategory.post_id, category_name FROM category INNER JOIN postcategory ON category.category_id = postcategory.category_id ) AS table1 ON post.post_id = table1.post_id WHERE table1.post_id='$postid'";
                    $result2 = mysqli_query($conn, $query2);
                    $length = mysqli_num_rows($result2);
                    while ($row2 = mysqli_fetch_array($result2)) {
                        if ($index == $length - 1) {
                            echo $row2['category_name'];
                        } else {
                            echo $row2['category_name'] . " | ";
                            $index += 1;
                        }
                    }
                    echo "</h4>";
                    // Time Difference
                    $then =  $row['timePosted'];
                    $now = date("Y-m-d H:i:s");
                    timeDiff($then, $now, 'postDiff');
                    //Category
                    echo "<div class='contentDetails'>";
                    // Username
                    echo "<h5>";
                    $query4 = "SELECT * FROM (SELECT post.usersId,usersFname,usersLname,ref_ID FROM post LEFT JOIN users ON post.usersId = users.usersId) AS userPost WHERE ref_ID='$id'";
                    $result4 = mysqli_query($conn, $query4);
                    while ($row4 = $result4->fetch_assoc()) {
                        echo "Post by: ";
                        echo "<a style='color:#363636;margin-left:0.10416667vw;'>";
                        echo $row4['usersFname'];
                        echo ' ' . $row4['usersLname'];
                    }
                    echo "</h5>";
                    echo "</a>";
                    // Username
                    echo "</;>";
                    // View count
                    $viewcount = $row['views'];
                    echo "<h5 style='margin-left: auto;'>" . $viewcount . " views" . "</h5>";
                    $viewcount += 1;
                    mysqli_query($conn, ("UPDATE post SET views=$viewcount WHERE ref_ID='$id'"));
                    //
                    if ($row['usersId'] == $_SESSION['userid'] || $_SESSION['role'] == 'moderator') {
                        echo "<button onclick='openContainer()'>";
                        echo "
                            <svg id='more-svg' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' width='0.67708333vw' height='0.67708333vw' viewBox='0 0 408 408' style='enable-background:new 0 0 408 408;' xml:space='preserve'>
                                <g>
                                    <g id='more-vert'>
                                        <path d='M204,102c28.05,0,51-22.95,51-51S232.05,0,204,0s-51,22.95-51,51S175.95,102,204,102z M204,153c-28.05,0-51,22.95-51,51    s22.95,51,51,51s51-22.95,51-51S232.05,153,204,153z M204,306c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51    S232.05,306,204,306z'/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>";
                        echo "</button>";
                        echo "<div class='option-container'>";
                        echo "<a id='edit-button'";
                        if ($row['usersId'] == $_SESSION['userid']) {
                            echo "href='./edit.php?id=$id'onclick='deleteCookie()'";
                        } else if ($_SESSION['role'] == "moderator" && $row['usersId'] != $_SESSION['userid']) {
                            echo "onclick='showPopout()'";
                        }
                        echo "><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' width='0.98958333vw' height='0.98958333vw' viewBox='0 0 528.899 528.899' style='enable-background:new 0 0 528.899 528.899;' xml:space='preserve'>
                        <g>
                            <path d='M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z'/>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        </svg>";
                        if ($_SESSION['role'] == "moderator" && $row['usersId'] != $_SESSION['userid']) {
                            echo "<h6>Modify</h6></a>";
                        } else {
                            echo "<h6>Edit</h6></a>";
                        }
                        if ($_SESSION['role'] == "moderator" && $row['usersId'] != $_SESSION['userid']) {
                            echo "<a href='delete.php?id=$id&user=$row[usersId]' id='delete-button'>";
                        } else {
                            echo "<a href='delete.php?id=$id' id='delete-button'>";
                        }
                        echo "<svg xmlns='http://www.w3.org/2000/svg' height='1.19791667vw' viewBox='-57 0 512 512' width='1.19791667vw'><path d='m156.371094 30.90625h85.570312v14.398438h30.902344v-16.414063c.003906-15.929687-12.949219-28.890625-28.871094-28.890625h-89.632812c-15.921875 0-28.875 12.960938-28.875 28.890625v16.414063h30.90625zm0 0'/><path d='m344.210938 167.75h-290.109376c-7.949218 0-14.207031 6.78125-13.566406 14.707031l24.253906 299.90625c1.351563 16.742188 15.316407 29.636719 32.09375 29.636719h204.542969c16.777344 0 30.742188-12.894531 32.09375-29.640625l24.253907-299.902344c.644531-7.925781-5.613282-14.707031-13.5625-14.707031zm-219.863282 312.261719c-.324218.019531-.648437.03125-.96875.03125-8.101562 0-14.902344-6.308594-15.40625-14.503907l-15.199218-246.207031c-.523438-8.519531 5.957031-15.851562 14.472656-16.375 8.488281-.515625 15.851562 5.949219 16.375 14.472657l15.195312 246.207031c.527344 8.519531-5.953125 15.847656-14.46875 16.375zm90.433594-15.421875c0 8.53125-6.917969 15.449218-15.453125 15.449218s-15.453125-6.917968-15.453125-15.449218v-246.210938c0-8.535156 6.917969-15.453125 15.453125-15.453125 8.53125 0 15.453125 6.917969 15.453125 15.453125zm90.757812-245.300782-14.511718 246.207032c-.480469 8.210937-7.292969 14.542968-15.410156 14.542968-.304688 0-.613282-.007812-.921876-.023437-8.519531-.503906-15.019531-7.816406-14.515624-16.335937l14.507812-246.210938c.5-8.519531 7.789062-15.019531 16.332031-14.515625 8.519531.5 15.019531 7.816406 14.519531 16.335937zm0 0'/><path d='m397.648438 120.0625-10.148438-30.421875c-2.675781-8.019531-10.183594-13.429687-18.640625-13.429687h-339.410156c-8.453125 0-15.964844 5.410156-18.636719 13.429687l-10.148438 30.421875c-1.957031 5.867188.589844 11.851562 5.34375 14.835938 1.9375 1.214843 4.230469 1.945312 6.75 1.945312h372.796876c2.519531 0 4.816406-.730469 6.75-1.949219 4.753906-2.984375 7.300781-8.96875 5.34375-14.832031zm0 0'/></svg>
                        <h6>Delete</h6>
                        </a>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "<div id='pre-content-deco'></div>";
                    echo "<div class='contentDescription'><pre>" . $row['description'] . "</pre></div>";
                    echo "<div style='margin-bottom:2.60416667vw' id='content-deco'></div>";
                    echo "</div>";
                }
                $replyIndex = 0;
                $result3 = mysqli_query($conn, $query3);
                while ($row3 = mysqli_fetch_array($result3)) {
                    $content = $row3['content'];
                    $replyID = $row3['reply_id'];
                    echo "<div class='posts-content'>";
                    // Username
                    echo "<div class='contentDetails'>";
                    echo "<h5>";
                    $query5 = "SELECT content,dateReplied,userPostReplies.usersId,usersFname,usersLname,ref_ID,reply_id FROM post RIGHT JOIN (SELECT content,dateReplied,usersId,post_id,usersFname,usersLname,postreply.reply_id FROM postreply LEFT JOIN (SELECT content,dateReplied,reply.usersId,reply_id,usersFname,usersLname FROM reply LEFT JOIN users ON reply.usersId = users.usersId) AS userreplies ON postreply.reply_id = userreplies.reply_id) As userPostReplies ON post.post_id = userPostReplies.post_id WHERE ref_ID = '$id' AND reply_id = '$replyID'";
                    $result5 = mysqli_query($conn, $query5);
                    while ($row5 = $result5->fetch_assoc()) {
                        echo "Reply by: ";
                        echo "<a style='color:#363636;margin-left:2px;'>";
                        echo $row5['usersFname'];
                        echo ' ' . $row5['usersLname'];
                        echo "</h5>";
                        echo "</a>";
                        if ($row5['usersId'] == $_SESSION['userid']) {
                            $replyIndex += 1;
                            echo "<button style='margin-left: auto;' onclick='openReplyContainer($replyIndex)'>";
                            echo "
                                <svg id='more-svg$replyIndex' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' width='0.67708333vw' height='0.67708333vw' viewBox='0 0 408 408' style='enable-background:new 0 0 408 408;' xml:space='preserve'>
                                    <g>
                                        <g id='more-vert'>
                                            <path d='M204,102c28.05,0,51-22.95,51-51S232.05,0,204,0s-51,22.95-51,51S175.95,102,204,102z M204,153c-28.05,0-51,22.95-51,51    s22.95,51,51,51s51-22.95,51-51S232.05,153,204,153z M204,306c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51    S232.05,306,204,306z'/>
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>";
                            echo "</button>";
                            echo "<div class='reply-option-container' id='reply-option-container$replyIndex'>";
                            echo "<div>";
                            echo "<a id='edit-button' onclick='enableEdit($replyIndex,this)'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' width='0.98958333vw' height='0.98958333vw' viewBox='0 0 528.899 528.899' style='enable-background:new 0 0 528.899 528.899;' xml:space='preserve'>
                                    <g>
                                        <path d='M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z'/>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    </svg><h6>Edit</h6></a>";
                            echo "<a id='delete-button' href=../deleteResponse.php?reply=$replyID&id=$id><svg xmlns='http://www.w3.org/2000/svg' height='1.19791667vw' viewBox='-57 0 512 512' width='1.19791667vw'><path d='m156.371094 30.90625h85.570312v14.398438h30.902344v-16.414063c.003906-15.929687-12.949219-28.890625-28.871094-28.890625h-89.632812c-15.921875 0-28.875 12.960938-28.875 28.890625v16.414063h30.90625zm0 0'/><path d='m344.210938 167.75h-290.109376c-7.949218 0-14.207031 6.78125-13.566406 14.707031l24.253906 299.90625c1.351563 16.742188 15.316407 29.636719 32.09375 29.636719h204.542969c16.777344 0 30.742188-12.894531 32.09375-29.640625l24.253907-299.902344c.644531-7.925781-5.613282-14.707031-13.5625-14.707031zm-219.863282 312.261719c-.324218.019531-.648437.03125-.96875.03125-8.101562 0-14.902344-6.308594-15.40625-14.503907l-15.199218-246.207031c-.523438-8.519531 5.957031-15.851562 14.472656-16.375 8.488281-.515625 15.851562 5.949219 16.375 14.472657l15.195312 246.207031c.527344 8.519531-5.953125 15.847656-14.46875 16.375zm90.433594-15.421875c0 8.53125-6.917969 15.449218-15.453125 15.449218s-15.453125-6.917968-15.453125-15.449218v-246.210938c0-8.535156 6.917969-15.453125 15.453125-15.453125 8.53125 0 15.453125 6.917969 15.453125 15.453125zm90.757812-245.300782-14.511718 246.207032c-.480469 8.210937-7.292969 14.542968-15.410156 14.542968-.304688 0-.613282-.007812-.921876-.023437-8.519531-.503906-15.019531-7.816406-14.515624-16.335937l14.507812-246.210938c.5-8.519531 7.789062-15.019531 16.332031-14.515625 8.519531.5 15.019531 7.816406 14.519531 16.335937zm0 0'/><path d='m397.648438 120.0625-10.148438-30.421875c-2.675781-8.019531-10.183594-13.429687-18.640625-13.429687h-339.410156c-8.453125 0-15.964844 5.410156-18.636719 13.429687l-10.148438 30.421875c-1.957031 5.867188.589844 11.851562 5.34375 14.835938 1.9375 1.214843 4.230469 1.945312 6.75 1.945312h372.796876c2.519531 0 4.816406-.730469 6.75-1.949219 4.753906-2.984375 7.300781-8.96875 5.34375-14.832031zm0 0'/></svg>
                                    <h6>Delete</h6>
                                    </a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div id='pre-content-deco'></div>";
                            echo "<div id='reply$replyIndex'>" . $content . "</div>";
                            echo "<div class='function-button'id='function-button$replyIndex'>";
                            echo "<a class='cancel-function-button'id='cancel-function-button$replyIndex'>Cancel</a>";
                            echo "<a class='save-function-button' id='save-function-button$replyIndex' href='../updateResponse.php?id=$id' onclick='createReplyCookie($replyIndex,$replyID)'>Save</a>";
                            echo "</div>";
                            echo "<div id='content-deco' style='margin-bottom:0px'></div>";
                            $then =  $row3['dateReplied'];
                            $now = date("Y-m-d H:i:s");
                            timeDiff($then, $now, 'replyDiff');
                            echo "</div>";
                        } else {
                            echo "</div>";
                            echo "<div id='pre-content-deco'></div>";
                            echo "<div class='contentDescription'><pre>" . $content . "</pre></div>";
                            echo "<div id='content-deco' style='margin-bottom:2.34375vw;'></div>";
                            echo "</div>";
                        }
                    }
                }
                ?>
                <div class="postResponse">
                    <div id="editor"></div>
                    <form action="../submitResponse.php" method="post">
                        <button id="submitResponse" onclick="createCookie()">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.992 511.992" style="enable-background:new 0 0 511.992 511.992;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M255.992,175.994h-64v-96c0-6.624-4.064-12.544-10.24-14.912c-6.112-2.432-13.152-0.768-17.6,4.16l-160,176    c-5.536,6.112-5.536,15.424,0,21.536l160,176c3.104,3.36,7.424,5.216,11.84,5.216c1.952,0,3.904-0.352,5.76-1.056    c6.176-2.4,10.24-8.32,10.24-14.944v-96h33.6c97.856,0,189.856,38.112,259.072,107.328c4.608,4.608,11.52,5.952,17.44,3.456    c5.984-2.464,9.888-8.32,9.888-14.784C511.992,290.842,397.144,175.994,255.992,175.994z" />
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                            <h6>Reply</h6>
                        </button>
                    </form>
                </div>
            </div>
            <div class="recommendedPost">
                <h4>You might like these...</h4>
                <div id="content-deco">
                </div>
                <div id="post-lists">
                    <?php
                    $index = 0;
                    $category = [];
                    $id = htmlspecialchars($_GET["id"]);
                    include_once '../dbh.inc.php';
                    $retrievePostID = "SELECT * FROM post WHERE ref_ID='$id'";
                    $result = mysqli_query($conn, $retrievePostID);
                    echo $conn->error;
                    while ($row = $result->fetch_assoc()) {
                        $postid = $row['post_id'];
                        $retrievePostCategory = "SELECT table1.category_name,table1.category_id FROM post INNER JOIN( SELECT category.category_id, postcategory.post_id, category_name FROM category INNER JOIN postcategory ON category.category_id = postcategory.category_id ) AS table1 ON post.post_id = table1.post_id WHERE table1.post_id='$postid'";
                        $result2 = mysqli_query($conn, $retrievePostCategory);
                        echo $conn->error;
                        while ($row2 = $result2->fetch_assoc()) {
                            $category[$index] = $row2['category_id'];
                            $index += 1;
                        }
                    }
                    if (empty($category[0])) {
                        echo "<h6>No other similar posts found";
                    } else if (empty($category[1])) {
                        $postTitle = "SELECT * FROM post LEFT JOIN (SELECT postcategory.category_id,post_id,category.category_name FROM postcategory LEFT JOIN category ON postcategory.category_id =category.category_id) AS categoryList ON post.post_id = categoryList.post_id WHERE categoryList.category_id = '$category[0]' AND NOT ref_ID='$id' LIMIT 7";
                        $result3 = mysqli_query($conn, $postTitle);
                        echo $conn->error;
                        $length = mysqli_num_rows($result3);
                        if ($length == 0) {
                            echo "<h6>No other similar post found</h6>";
                        } else {
                            while ($row3 = $result3->fetch_assoc()) {
                                if ($origin) {
                                    $refID = $row3['ref_ID'];
                                    echo "<a id='post-lists' href='/include/post/showPost.php?id=$refID&origin=$origin'>";
                                    echo $row3['title'];
                                    echo "</a>";
                                } else {
                                    $refID = $row3['ref_ID'];
                                    echo "<a id='post-lists' href='/include/post/showPost.php?id=$refID'>";
                                    echo $row3['title'];
                                    echo "</a>";
                                }
                            }
                        }
                    } else {
                        if (empty($category[2])) {
                            $postTitle = "SELECT categoryList.post_id,post.title,post.ref_ID,count(categoryList.post_id) FROM post LEFT JOIN (SELECT postcategory.category_id,post_id,category.category_name FROM postcategory LEFT JOIN category ON postcategory.category_id =category.category_id) AS categoryList ON post.post_id = categoryList.post_id WHERE (categoryList.category_id = '$category[0]' OR  categoryList.category_id = '$category[1]') AND NOT ref_ID = '$id' GROUP BY categoryList.post_id ORDER BY count(categoryList.post_id) DESC LIMIT 7";
                            $result3 = mysqli_query($conn, $postTitle);
                            $conn->error;
                            while ($row3 = $result3->fetch_assoc()) {
                                if ($origin) {
                                    $refID = $row3['ref_ID'];
                                    echo "<a id='post-lists' href='/include/post/showPost.php?id=$refID&origin=$origin'>";
                                    echo $row3['title'];
                                    echo "</a>";
                                } else {
                                    $refID = $row3['ref_ID'];
                                    echo "<a id='post-lists' href='/include/post/showPost.php?id=$refID'>";
                                    echo $row3['title'];
                                    echo "</a>";
                                }
                            }
                        } else {
                            $postTitle = "SELECT categoryList.post_id,post.title,post.ref_ID,count(categoryList.post_id) FROM post LEFT JOIN (SELECT postcategory.category_id,post_id,category.category_name FROM postcategory LEFT JOIN category ON postcategory.category_id =category.category_id) AS categoryList ON post.post_id = categoryList.post_id WHERE (categoryList.category_id = '$category[0]' OR  categoryList.category_id = '$category[1]' OR  categoryList.category_id = '$category[2]') AND NOT ref_ID = '$id' GROUP BY categoryList.post_id ORDER BY count(categoryList.post_id) DESC LIMIT 7";
                            $result3 = mysqli_query($conn, $postTitle);
                            $conn->error;
                            while ($row3 = $result3->fetch_assoc()) {
                                if ($origin) {
                                    $refID = $row3['ref_ID'];
                                    echo "<a id='post-lists' href='/include/post/showPost.php?id=$refID&origin=$origin'>";
                                    echo $row3['title'];
                                    echo "</a>";
                                } else {
                                    $refID = $row3['ref_ID'];
                                    echo "<a id='post-lists' href='/include/post/showPost.php?id=$refID'>";
                                    echo $row3['title'];
                                    echo "</a>";
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/2fbbb4bb77.js" crossorigin="anonymous"></script>
    <!-- Include the Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://unpkg.com/quill-image-uploader@1.2.1/dist/quill.imageUploader.min.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const toolbarOptions = [
            [{
                header: [1, 2, 3, false]
            }],
            [{
                color: []
            }, {
                background: []
            }],
            ["bold", "italic", "underline", "strike"],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            ["link", "image", "code", "video"]
        ];
        var FontAttributor = Quill.import('attributors/class/font');
        let Link = Quill.import('formats/link');
        class CustomLink extends Link {
            static sanitize(url) {
                let value = super.sanitize(url);
                if (value) {
                    for (let i = 0; i < CustomLink.PROTOCOL_WHITELIST.length; i++)
                        if (value.startsWith(CustomLink.PROTOCOL_WHITELIST[i]))
                            return value;
                    return `http://${value}`
                }
                return value;
            }
        }
        Quill.register(CustomLink);
        FontAttributor.whitelist = [
            'Open Sans'
        ];
        var length = document.querySelectorAll('.reply-option-container').length;
        Quill.register(FontAttributor, true);
        Quill.register("modules/imageUploader", ImageUploader);
        var Editors = ['#editor'];
        for (let index = 0; index < length; index++) {
            Editors[index + 1] = `#reply${index+1}`;
        }
        var quill = [];
        for (var k = 0; k < Editors.length; k++) {
            if (k == 0) {
                quill[k] = new Quill(Editors[k], {
                    theme: "snow",
                    placeholder: "Leave a response here...",
                    modules: {
                        toolbar: toolbarOptions,
                        imageUploader: {
                            upload: file => {
                                return new Promise((resolve, reject) => {
                                    const formData = new FormData();
                                    formData.append("image", file);

                                    fetch(
                                            "https://api.imgbb.com/1/upload?key=3338a627d859e76f9ec25554d6b38388", {
                                                method: "POST",
                                                body: formData
                                            }
                                        )
                                        .then(response => response.json())
                                        .then(result => {
                                            console.log(result);
                                            resolve(result.data.url);
                                        })
                                        .catch(error => {
                                            reject("Upload failed");
                                            console.error("Error:", error);
                                        });
                                });
                            }
                        },
                    }
                });
            } else if (k > 0) {
                quill[k] = new Quill(Editors[k], {
                    theme: "snow",
                    placeholder: "",
                    readOnly: true,
                    modules: {
                        toolbar: toolbarOptions,
                        imageUploader: {
                            upload: file => {
                                return new Promise((resolve, reject) => {
                                    const formData = new FormData();
                                    formData.append("image", file);

                                    fetch(
                                            "https://api.imgbb.com/1/upload?key=3338a627d859e76f9ec25554d6b38388", {
                                                method: "POST",
                                                body: formData
                                            }
                                        )
                                        .then(response => response.json())
                                        .then(result => {
                                            console.log(result);
                                            resolve(result.data.url);
                                        })
                                        .catch(error => {
                                            reject("Upload failed");
                                            console.error("Error:", error);
                                        });
                                });
                            }
                        },
                    }
                });
            }
        }
    </script>
    <script>
        function delStorage() {
            var storageItem = getCookie("newPost")
            var storageItem2 = getCookie("newReply")
            var storageItem3 = getCookie("newEditPost")
            var storageItem4 = getCookie("newEditResponse")
            var storageItem5 = getCookie("deletedResponse")
            localStorage.removeItem("savedText")
            if (storageItem == "yes") {
                var messageBox = document.querySelector('.successmessage')
                messageBox.style.animation = "slidedown 3s cubic-bezier(0, 1, 0, 1)";
                messageBox.innerHTML += "<h6>Post created successfully</h6>";
                document.querySelector('.post-content').style.animation = "movedown 3s cubic-bezier(0, 1, 0, 1)";
                delete_cookie("newPost", "/", "");
            }
            if (storageItem2 == "yes") {
                var messageBox = document.querySelector('.successmessage')
                messageBox.style.animation = "slidedown 3s cubic-bezier(0, 1, 0, 1)";
                messageBox.innerHTML += "<h6>Response created successfully</h6>";
                document.querySelector('.post-content').style.animation = "movedown 3s cubic-bezier(0, 1, 0, 1)";
                delete_cookie("newReply", "/", "");
            }
            if (storageItem3 == "yes") {
                var messageBox = document.querySelector('.successmessage')
                messageBox.style.animation = "slidedown 3s cubic-bezier(0, 1, 0, 1)";
                messageBox.innerHTML += "<h6>Post changes saved successfully</h6>";
                document.querySelector('.post-content').style.animation = "movedown 3s cubic-bezier(0, 1, 0, 1)";
                delete_cookie("newEditPost", "/", "");
            }
            if (storageItem4 == "yes") {
                var messageBox = document.querySelector('.successmessage')
                messageBox.style.animation = "slidedown 3s cubic-bezier(0, 1, 0, 1)";
                messageBox.innerHTML += "<h6>Response changes saved successfully</h6>";
                document.querySelector('.post-content').style.animation = "movedown 3s cubic-bezier(0, 1, 0, 1)";
                delete_cookie("newEditResponse", "/", "");
            }
            if (storageItem5 == "yes") {
                var messageBox = document.querySelector('.successmessage')
                messageBox.style.animation = "slidedown 3s cubic-bezier(0, 1, 0, 1)";
                messageBox.innerHTML += "<h6>Response deleted successfully</h6>";
                document.querySelector('.post-content').style.animation = "movedown 3s cubic-bezier(0, 1, 0, 1)";
                delete_cookie("deletedResponse", "/", "");
            }
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        function delete_cookie(name, path, domain) {
            if (getCookie(name)) {
                document.cookie = name + "=" + ((path) ? ";path=" + path : "") + ((domain) ?
                    ";domain=" + domain : "") + ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
            }
        }
    </script>
    <script>
        // create cookie
        function createCookie() {
            var quillHtml = document.querySelector('#editor .ql-editor').innerHTML.trim();
            var expires = 1;
            const currentLink = window.location.search;
            const urlParams = new URLSearchParams(currentLink);
            var url = urlParams.get("id")
            var content = {
                reply: quillHtml,
                id: url
            };
            if (1) {
                var date = new Date();
                date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = 'reply' + "=" + encodeURIComponent(JSON.stringify(content)) + expires + "; path=/";
        }

        function createReplyCookie(id, replyID) {
            var quillHtml = document.querySelector(`#reply${id} .ql-editor`).innerHTML.trim();
            var expires = 1;
            var content = {
                reply: quillHtml,
                id: replyID
            };
            if (1) {
                var date = new Date();
                date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = 'reply' + "=" + encodeURIComponent(JSON.stringify(content)) + expires + "; path=/";
            console.log(content);
        }

        function createPostValidation() {
            var expires = 1;
            var validation = 1;
            if (1) {
                var date = new Date();
                date.setTime(date.getTime() + (1 * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = 'newPost' + "=" + validation + expires + "; path=/";
            document.cookie = 'newEditPost' + "=" + validation + expires + "; path=/";
        }
    </script>
    <script>
        var boxIndex = 0
        var container = document.querySelector('.option-container')

        function openContainer() {
            if (boxIndex == 0) {
                container.style.display = "block";
                document.getElementById('more-svg').style.fill = "#EF6C35";
                boxIndex += 1;
            } else if (boxIndex == 1) {
                container.style.display = "none";
                document.getElementById('more-svg').style.fill = "#363636";
                boxIndex -= 1;
            }
        }

        function openReplyContainer(index) {
            var container = document.getElementById(`reply-option-container${index}`)
            if (container.style.display == "") {
                container.style.display = "block";
                document.getElementById(`more-svg${index}`).style.fill = "#EF6C35";
            } else if (container.style.display == "none") {
                container.style.display = "block";
                document.getElementById(`more-svg${index}`).style.fill = "#EF6C35";
            } else if (container.style.display == "block") {
                container.style.display = "none";
                document.getElementById(`more-svg${index}`).style.fill = "#363636";
            }

        }
    </script>
    <script>
        function deleteCookie() {
            var storageItem = getCookie("newEditPost")
            delete_cookie("newEditPost", "/", "");

            function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }

            function delete_cookie(name, path, domain) {
                if (getCookie(name)) {
                    document.cookie = name + "=" +
                        ((path) ? ";path=" + path : "") +
                        ((domain) ? ";domain=" + domain : "") +
                        ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
                }
            }
        }
    </script>
    <script>
        var toolbar = document.querySelectorAll('.ql-toolbar.ql-snow')
        var test = []
        for (let index = 0; index < toolbar.length - 1; index++) {
            test[index] = 0;
        }

        function enableEdit(id, element) {
            var previousText = quill[id].root.innerHTML.trim();
            var ed = document.querySelector(`#reply${id} .ql-editor`)
            var save = document.querySelector(`#save-function-button${id}`)
            save.style.display = "none";
            ed.addEventListener('keyup', () => {
                var length = quill[id].getText().trim().length;
                if (length == 0) {
                    save.style.display = 'none'
                } else {
                    save.style.display = 'block'
                }
            })

            quill[id].enable();
            var quillwindow = document.querySelector(`#reply${id}`)
            element.remove();
            document.getElementById(`reply-option-container${id}`).style.display = "none";
            var editor = document.querySelector(`#reply${id} .ql-editor`)
            editor.style.padding = "0.625vw 0.78125vw";
            editor.style.setProperty("border", "0.05208333vw solid #ccc", "important")
            var toolbar = document.querySelectorAll('.ql-toolbar.ql-snow')
            toolbar[id - 1].style.setProperty("overflow", "visible", "important");
            toolbar[id - 1].style.setProperty("max-height", "5.20833333vw", "important");
            toolbar[id - 1].style.setProperty("padding", "0.41666667vw", "important");
            toolbar[id - 1].style.setProperty("border", "0.05208333vw solid #ccc", "important");
            quillwindow.style.setProperty("height", "13.02083333vw", "important");
            editor.style.setProperty("padding", "0.625vw 0.78125vw", "important")
            document.getElementById(`function-button${id}`).style.setProperty("display", "flex");
            document.getElementById(`more-svg${id}`).style.fill = "white";
            if (test[id - 1] == 0) {
                document.getElementById(`cancel-function-button${id}`).addEventListener('click', () => {
                    quill[id].root.innerHTML = previousText;
                    returnEditButton(id);
                    revertBack(id);
                    test[id - 1] += 1;
                })
            }

            function returnEditButton(id) {
                //
                var edit = document.createTextNode('Edit')
                var h6 = document.createElement('H6')
                var editButton = document.createElement("img");
                var link = document.createElement('A')
                //
                h6.appendChild(edit)
                editButton.src = '/materials/draw.png';
                var container = document.querySelector(`#reply-option-container${id} div`)
                link.appendChild(editButton)
                link.appendChild(h6)
                link.addEventListener('click', () => {
                    enableEdit(id, link)
                })
                link.className = 'editUniversal';
                container.insertBefore(link, container.firstChild)
            }

            function revertBack(id) {
                quill[id].disable();
                var quillwindow = document.querySelector(`#reply${id}`)
                document.getElementById(`reply-option-container${id}`).style.display = "none";
                var editor = document.querySelector(`#reply${id} .ql-editor`)
                editor.style.padding = "0px";
                editor.style.setProperty("border", "none")
                var toolbar = document.querySelectorAll('.ql-toolbar.ql-snow')
                toolbar[id - 1].style.setProperty("overflow", "hidden");
                toolbar[id - 1].style.setProperty("max-height", "0px");
                toolbar[id - 1].style.setProperty("padding", "0px");
                toolbar[id - 1].style.setProperty("border", "none");
                quillwindow.style.setProperty("height", "initial", "important");
                document.getElementById(`function-button${id}`).style.setProperty("display", "none");
            }
        }
    </script>
    <script>
        var text = document.querySelector('#editor .ql-editor')
        text.addEventListener('keyup', checkcontent);
        var link = document.querySelector('#submitResponse')

        function checkcontent() {
            var length = text.textContent.length;
            if (length == 0) {
                link.style.display = "none"
            } else {
                link.style.display = "flex"
            }
        }
    </script>
    <!-- Confirm popout box -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script>
        var selectedCategory = [];

        function updateCategory() {
            var url_string = window.location.href
            var url = new URL(url_string)
            var refID = url.searchParams.get('id')
            let arrayIndex = 0;
            $('.chosenCategory').each(function() {
                selectedCategory[arrayIndex] = $(this).find('h6').text()
                arrayIndex += 1;
            })
            $.ajax({
                type: "GET",
                url: "/include/updateCategoryMod.php",
                data: {
                    postID: refID,
                    categoryList: selectedCategory
                },
                complete: function() {
                    location.reload()
                }
            });
        }

        function showPopout() {
            var url_string = window.location.href;
            var url = new URL(url_string);
            var postRef = url.searchParams.get('id')
            $.confirm({
                icon: 'fas fa-edit',
                title: '<h3 class=popout-title>Modify category</h3>',
                content: `url:/include/moderatorModify.php?id=${postRef}`,
                draggable: false,
                buttons: {
                    cancel: {
                        function() {}
                    },
                    update: {
                        btnClass: 'btn-green',
                        action: function() {
                            updateCategory();
                        }
                    }
                }
            })
        }
    </script>
</body>

</html>
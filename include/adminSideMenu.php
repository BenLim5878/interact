<link rel="stylesheet" href="/interact/styles/adminSideMenu.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<div class="admin-side-menu">
    <div id="admin-profile">
        <div id="admin-profile-image"></div>
        <?php
        // Username
        include './include/dbh.inc.php';
        $userID = $_SESSION['userid'];
        echo "<h3>";
        $query = "SELECT * FROM users WHERE usersId='$userID'";
        $result = mysqli_query($conn, $query);
        while ($row = $result->fetch_assoc()) {
            echo $row['usersFname'];
            echo ' ' . $row['usersLname'];
        }
        echo "</h3>";
        // Username
        ?>
        <h4>Admin</h4>
    </div>
    <ul class="admin-links">
        <!-- DashBoard -->
        <li>
            <a href="/interact/adminPage.php" id="dashboard-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36">
                    <path d="M32 0H4C1.79 0 0 1.79 0 4V32C0 34.21 1.79 36 4 36H32C34.21 36 36 34.21 36 32V4C36 1.79 34.21 0 32 0ZM12 28H8V14H12V28ZM20 28H16V8H20V28ZM28 28H24V20H28V28Z" />
                </svg>
                <h5>DashBoard</h5>
            </a>
        </li>
        <!-- User -->
        <li>
            <a href="/interact/adminUser.php" id="user-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 40">
                    <path d="M18 0C20.21 0 22 1.79 22 4C22 6.21 20.21 8 18 8C15.79 8 14 6.21 14 4C14 1.79 15.79 0 18 0ZM36 14H24V40H20V28H16V40H12V14H0V10H36V14Z" />
                </svg>
                <h5>Users</h5>
            </a>
        </li>
        <!-- Insights -->
        <li>
            <a href="/interact/insights.php" id="insights-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 42">
                    <path d="M5.1 34.07L7.93 36.9L11.52 33.31L8.69 30.48L5.1 34.07ZM20 41.9H24V36H20V41.9ZM6 18H0V22H6V18ZM28 9.62V0H16V9.62C12.42 11.7 10 15.56 10 20C10 26.63 15.37 32 22 32C28.63 32 34 26.63 34 20C34 15.56 31.58 11.69 28 9.62ZM38 18V22H44V18H38ZM32.49 33.31L36.08 36.9L38.91 34.07L35.32 30.48L32.49 33.31Z" />
                </svg>
                <h5>Insights</h5>
            </a>
        </li>
        <!-- Help Center -->
        <li>
            <a href="/interact/adminHelpCenter.php" id="helpCenter-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 37">
                    <path d="M39.4542 30.1847L22.8083 14.7873C24.4456 10.9169 23.536 6.28921 20.1705 3.17607C16.532 -0.189499 11.0743 -0.862612 6.70819 1.07259L14.6218 8.39269L9.07318 13.5252L1.15955 6.20507C-0.932554 10.2438 -0.204864 15.2921 3.43359 18.6577C6.79915 21.7708 11.802 22.6122 15.9862 21.0977L32.6321 36.4952C33.3598 37.1683 34.5423 37.1683 35.1791 36.4952L39.4542 32.5406C40.1819 31.9516 40.1819 30.8578 39.4542 30.1847Z" />
                </svg>
                <h5>Help Center</h5>
            </a>
        </li>
        <!-- Request -->
        <li>
            <a href="/interact/manageRequest.php" id="request-link">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="m448.800781 0h-192.800781c-34.90625 0-63.199219 28.242188-63.199219 63.199219v289.199219c0 12.269531 14.070313 19.445312 24 12l60.265625-45.199219h171.734375c34.90625 0 63.199219-28.242188 63.199219-63.199219v-192.800781c0-34.90625-28.242188-63.199219-63.199219-63.199219zm-111.402343 238.867188h-65.332032c-8.285156 0-15-6.714844-15-15 0-8.285157 6.714844-15 15-15h65.332032c8.285156 0 15 6.714843 15 15 0 8.285156-6.714844 15-15 15zm95.335937-64.265626h-160.667969c-8.285156 0-15-6.71875-15-15 0-8.285156 6.714844-15 15-15h160.667969c8.28125 0 15 6.714844 15 15 0 8.28125-6.714844 15-15 15zm0-64.269531h-160.667969c-8.285156 0-15-6.714843-15-15 0-8.28125 6.714844-15 15-15h160.667969c8.28125 0 15 6.71875 15 15 0 8.285157-6.714844 15-15 15zm0 0" />
                    <path d="m166.238281 311.898438c0 39.160156-31.746093 70.90625-70.90625 70.90625-39.160156 0-70.90625-31.746094-70.90625-70.90625 0-39.164063 31.746094-70.910157 70.90625-70.910157 39.160157 0 70.90625 31.746094 70.90625 70.910157zm0 0" />
                    <path d="m95.332031 382.804688c-52.648437 0-95.332031 42.683593-95.332031 95.332031v18.863281c0 8.285156 6.714844 15 15 15h160.667969c8.28125 0 15-6.714844 15-15v-18.863281c0-52.648438-42.683594-95.332031-95.335938-95.332031zm0 0" />
                </svg>
                <h5>Support</h5>
            </a>
        </li>
    </ul>
</div>
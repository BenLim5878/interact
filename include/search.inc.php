<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <title>Help - Interact</title>
  <link rel="stylesheet" href="../styles/help.css">
  <link rel="stylesheet" href="../styles/footer.css">
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="/styles/helpSearchResult.css">
  <link rel="shortcut icon" type="image/png" href="../materials/logo/logo-transparent.png">
</head>

<body>
  <header>
    <div class="wrapper">
      <?php include 'header.php'; ?>
    </div>
  </header>
  <main>
    <div class="wrapper">
      <h1 id='search-result-title'>Search Results for "<?php echo $_POST['search']; ?>" :</h1>
      <div class="search-content">
        <?php
        include './dbh.inc.php';
        if (isset($_POST['submit-search'])) {
          $search = mysqli_real_escape_string($conn, $_POST['search']); //data safe avoid sql injection
          $sql = "SELECT * FROM rulesregulations WHERE category LIKE '%$search%' OR title LIKE '%$search%' OR content LIKE '%$search%'";
          $result = mysqli_query($conn, $sql);
          $queryResult = mysqli_num_rows($result);

          if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              if ($row['type'] == "regulation") {
                echo "<a href ='/archive/rules-regulations/$row[ref_name].php'><div class='article-box'>";
              } elseif ($row['type'] == "general") {
                echo "<a href ='/archive/about/$row[ref_name].php'><div class='article-box'>";
              } elseif ($row['type'] == "account") {
                echo "<a href ='/archive/account/$row[ref_name].php'><div class='article-box'>";
              }
              echo "<h3>" . $row['category'] . "</h3>";
              echo "<h4>" . $row['title'] . "</h4>";
              echo "<h5>" . $row['content'] . "</h5>";
              echo "<p>" . $row['datePosted'] . "</p>";
              echo "</div></a>";
            }
          } else {
            echo "<h6 id='noResult'>There are no result matching your search!</h6>";
          }
        }
        ?>
      </div>
    </div>
  </main>
  <script>
    $(document).ready(function() {
      $('.landingpage-header').css("animation", "none")
    });
  </script>
</body>

</html>
<?php
include_once "./dbh.inc.php";
$id = $_GET['rulesRegulations_ID'];
$qry = mysqli_query($conn, "SELECT * FROM rulesregulations WHERE rulesRegulations_ID= '$id'");
$data = mysqli_fetch_array($qry);
if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $edit = mysqli_query($conn, "UPDATE rulesregulations SET category='$category',title='$title', content='$content' WHERE rulesRegulations_ID='$id'");
    if ($edit) {
        mysqli_close($conn);
        header("location:index.php");
        exit;
    } else {
        echo mysqli_error();
    }
}
?>

<h3>Update Data</h3>

<form method="POST">
    <input type="text" name="category" value="<?php echo $data['category'] ?>" placeholder="Enter Category" Required>
    <input type="text" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter Title" Required>
    <textarea name="content" rows="8" cols="80" placeholder="Enter Content"><?php echo $data['content'] ?></textarea>

    <input type="submit" name="update" value="Update">
</form>
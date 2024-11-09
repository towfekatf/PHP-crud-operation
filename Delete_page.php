<?php include('dbcon.php'); ?>

<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `product` WHERE `id` = '$id'";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?delete_msg=you successfully deleted');
        exit;
    }
}
?>

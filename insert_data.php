<?php
include'dbcon.php';
if (isset($_POST['add_inventory'])) {
    $pro_name = $_POST['p_name'];
    $des = $_POST['d_name'];
    $pricee = $_POST['price'];
    $quan = $_POST['quantity'];

    if ($pro_name == "" || empty($pro_name)) {
        header('Location: index.php?message=you need to fill the product name');
        exit;
    } else {
        $query = "INSERT INTO `product` (`product_name`, `description`, `price`, `quantity`) 
                  VALUES ('$pro_name', '$des', '$pricee', '$quan')";

        $result = mysqli_query($connection, $query); 
        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        } else {
            header('Location: index.php?message=Product added successfully');
            exit;
        }
    }
}
?>

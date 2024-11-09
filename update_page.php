<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `product` WHERE `id` = '$id'"; 
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php 
if (isset($_POST['update_inventory'])) {
    $pname = $_POST['p_name'];
    $dname = $_POST['d_name'];
    $ppname = $_POST['price'];
    $qname = $_POST['quantity'];
    $id = $_POST['id']; 
    
    $query = "UPDATE `product` SET 
                `product_name` = '$pname', 
                `description` = '$dname', 
                `price` = '$ppname', 
                `quantity` = '$qname' 
              WHERE `id` = $id";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?update_msg=you successfully updated');
        exit;
    }
}
?>

<!-- Form to Update Product -->
<form action="update_page.php?id=<?php echo $id; ?>" method="post">
    <!-- Hidden field to pass ID to POST request -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
        <label for="p_name">Product Name</label>
        <input type="text" name="p_name" class="form-control" value="<?php echo $row['product_name']; ?>"> 
    </div>

    <div class="form-group">
        <label for="d_name">Description</label>
        <input type="text" name="d_name" class="form-control" value="<?php echo $row['description']; ?>"> 
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>"> 
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>"> 
    </div>

    <input type="submit" class="btn btn-success" name="update_inventory" value="UPDATE INVENTORY">
</form>

<?php include('footer.php'); ?>

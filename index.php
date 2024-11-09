<?php include('header.php');?>
<?php include('dbcon.php');?>

<div class="box1"> 
<h2>Inventory Repository</h2>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
ADD
</button>
</div>
  

    <table class="table table-hover table-boarder table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>product name</th>
                <th>description</th>
                <th>price</th>
                <th>quantity</th>
                <th>update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>


        <?php
        
        $query = "SELECT * FROM product";

        $result = mysqli_query($connection, $query);

        if(!$result){

            die("query failed".mysqli_error($connection));
        }

        else{
            while($row = mysqli_fetch_assoc($result)){
                ?>

<tr>
                <td> <?php echo $row['id'];?></td>
                <td> <?php echo $row['product_name'];?></td>
                <td> <?php echo $row['description'];?></td>
                <td> <?php echo $row['price'];?></td>
                <td> <?php echo $row['quantity'];?></td>
                <td><a href="update_page.php?id=<?php echo $row['id'];?>"class="btn btn-success">update</a></td>
                <td><a href="Delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>

            <?php


                }
             }

                ?>


           
        </tbody>
    </table>

    <?php
    if(isset($_GET['insert_message'])){
        echo"<h6>".$_GET['insert_message']."</h6>";
    }
    ?>

<?php
    if(isset($_GET['update_msg'])){
        echo"<h6>".$_GET['update_msg']."</h6>";
    }
    ?>

<?php
    if(isset($_GET['delete_msg'])){
        echo"<h6>".$_GET['delete_msg']."</h6>";
    }
    ?>

    <form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <div class="from-group">
            <label for="p_name">product name</label>
            <input type="text" name="p_name" class="from-control"> 
        </div>

        <div class="from-group">
            <label for="d_name">description</label>
            <input type="text" name="d_name" class="from-control"> 
        </div>

        <div class="from-group">
            <label for="price">price</label>
            <input type="text" name="price" class="from-control"> 
        </div>

        <div class="from-group">
            <label for="p_name">quantity</label>
            <input type="text" name="quantity" class="from-control"> 
        </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_inventory" value="ADD INVENTORY">
      </div>
    </div>
  </div>
</div>
</div>
</form> 
    <?php include('footer.php');?>
    
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_management";


$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error){
    echo "failed";
}

 


?>
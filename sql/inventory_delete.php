<?php 
    $pdo = require 'connection.php';

    $product_id =  $_POST['product_delete'];

    $sql = "DELETE FROM product WHERE product_id = :product_id";

    $statement = $pdo->prepare($sql);
    $statement->bindParam('product_id', $product_id);

    if($statement->execute()){
        header("Location: ../inventory.php");
        echo 'deleted!';
    }
?>
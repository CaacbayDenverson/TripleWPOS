<?php 
    $pdo = require 'connection.php';

    $data = [
        'product_id' => 1,
        'product_name' => 'placeholder',
        'product_code' => 'code',
        'product_price' => 999,
        'product_qty' => 999,
    ];

    $sql = "UPDATE product 
        SET product_name = :product_name, code = :product_code, product_price = :product_price, product_qty = :product_qty WHERE product_id = :product_id";

    $statement = $pdo->prepare($sql);

    $statement->bindParam(':product_id', $data['product_id']);
    $statement->bindParam(':product_name', $data['product_name']);
    $statement->bindParam(':product_code', $data['product_code']);
    $statement->bindParam(':product_price', $data['product_price']);
    $statement->bindParam(':product_qty', $data['product_qty']);

    //change
    $data['product_id'] = $_POST['product_id'];
    $data['product_name'] = $_POST['product_name'];
    $data['product_code'] = $_POST['product_code'];
    $data['product_price'] = $_POST['product_price'];
    $data['product_qty'] = $_POST['product_qty'];

    if($statement->execute()){
        echo "<script>
        alert('Update Success!');
        window.location.href='../inventory.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Update Failed!');
        window.location.href='../inventory.php';
        </script>";
    }

?>
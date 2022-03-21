<?php 
    $pdo = require 'connection.php';

    //
    $product_name = '';
    $product_price = '';
    $product_qty = '';

    $sql = 'INSERT INTO product(product_name, product_price, product_qty) VALUES (:product_name, :product_price, :product_qty)';

    $statement = $pdo->prepare($sql);

    $newProd = [
        'product_name' => 'placeholder',
        'product_price' => 999,
        'product_qty' => 999,
    ];

    $statement->bindParam(':product_name', $newProd['product_name']);
    $statement->bindParam(':product_price', $newProd['product_price']);
    $statement->bindParam(':product_qty', $newProd['product_qty']);

    //change
    $newProd['product_name'] = $_POST['productNew_name'];
    $newProd['product_price'] = $_POST['productNew_price'];
    $newProd['product_qty'] = $_POST['productNew_qty'];

    //execute query
    $statement->execute();
    header("Location: ../inventory.php");
    exit();
?>
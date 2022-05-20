<?php 
    $pdo = require 'connection.php';
    session_start();

    //
    $productAll = '';
    $processTotal = '';
    $processCash = '';
    $processChange = '';

    $sql = 'INSERT INTO invoice(products, total, cash, cash_change) 
        VALUES (:products, :total, :cash, :cash_change)';

    $statement = $pdo->prepare($sql);

    $newInv = [
        'products' => 'text',
        'total' => '9',
        'cash' => 9,
        'cash_change' => 9,
    ];

    $statement->bindParam(':products', $newInv['products']);
    $statement->bindParam(':total', $newInv['total']);
    $statement->bindParam(':cash', $newInv['cash']);
    $statement->bindParam(':cash_change', $newInv['cash_change']);

    //change
    $newInv['products'] = $_POST['productAll'];
    $newInv['total'] = $_POST['processTotal'];
    $newInv['cash'] = $_POST['processCash'];
    $newInv['cash_change'] = $_POST['processChange'];

    //execute query
    $statement->execute();

    unset($_SESSION["shopping_cart"]);
    echo "<script>
    alert('Payment Finished!');
    window.location.href='../pos.php';
    </script>";
    exit();
?>
<?php 
    $pdo = require 'connection.php';

    //get product rows
    $sql1 = "SELECT * FROM product";
    $statement = $pdo->prepare($sql1);
    $statement->execute();

    //get invoice rows
    $sql2 = "SELECT * FROM invoice";
    $statement2 = $pdo->prepare($sql2);
    $statement2->execute();

    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    $invoices = $statement2->fetchAll(PDO::FETCH_ASSOC);

    //backup products
    $backup_code1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
    if($products && $invoices){
        foreach($products as $product){
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $code = $product['code'];
            $product_price = $product['product_price'];
            $product_qty = $product['product_qty'];

            //insert product backup. add a randomg string with max length of 5 in the backup_code field
            //generate the same backup code for all products that are being backed up
            //after the backup code is generated, store it inside a constant variable
            $sql3 = "INSERT INTO backup_product (id, product_name, code, product_price, product_qty, backup_code) VALUES ('$product_id', '$product_name', '$code', '$product_price', '$product_qty', '$backup_code1')";
            $statement3 = $pdo->prepare($sql3);
            $statement3->execute();
        }
    }
    
    
    $backup_code2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
    foreach($invoices as $invoice){
        $order_id = $invoice['order_id'];
        $order_no = $invoice['order_no'];
        $product = $invoice['product'];
        $total = $invoice['total'];
        $cash = $invoice['cash'];
        $cash_change = $invoice['cash_change'];
        $created_at = $invoice['created_at'];

        //insert invoice backup. add a randomg string with max length of 5 in the backup_code field
        //generate the same backup code for all invoices that are being backed up
        //after the backup code is generated, store it inside a constant variable
        $sql4 = "INSERT INTO backup_invoice (id, order_no, product, total, cash, cash_change, created_at, backup_code) VALUES ('$order_id', '$order_no', '$product', '$total', '$cash', '$cash_change', '$created_at', '$backup_code2')";
        $statement4 = $pdo->prepare($sql4);
        $statement4->execute();
        //redirect to profile.php
        header('Location: ../profile.php');
    }

?>
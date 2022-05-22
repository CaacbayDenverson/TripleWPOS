<?php 
    $pdo = require 'connection.php';

    //
    $product_name = '';
    $product_code = '';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $product_name = $_POST['productNew_name'];
        $product_code = $_POST['productNew_code'];

        // check for dup prod name
        $searchProduct = "SELECT * FROM product WHERE product_name = '".$product_name."' ";
        $statement = $pdo->query($searchProduct);
        $productInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
        $countProd = $statement->rowCount();

        // check for dup code
        $searchProduct = "SELECT * FROM product WHERE code = '".$product_code."' ";
        $statements = $pdo->query($searchProduct);
        $codeInfo = $statements->fetchAll(PDO::FETCH_ASSOC);
        $countCode = $statements->rowCount();
        
        if($countProd > 0){
            echo "<script>alert('Product already existed!');
            window.location.href='../inventory.php';
            </script>";
        }
        else if($countCode > 0){
            echo "<script>alert('Code already existed!');
            window.location.href='../inventory.php';
            </script>";
        }
        else{
            echo "proceed";
        }

    }

    // // insert product
    // $sql = 'INSERT INTO product(product_name, code,product_price, product_qty) VALUES (:product_name, :product_code,:product_price, :product_qty)';

    // $statement = $pdo->prepare($sql);

    // $newProd = [
    //     'product_name' => 'placeholder',
    //     'product_code' => 'zzz',
    //     'product_price' => 999,
    //     'product_qty' => 999,
    // ];

    // $statement->bindParam(':product_name', $newProd['product_name']);
    // $statement->bindParam(':product_code', $newProd['product_code']);
    // $statement->bindParam(':product_price', $newProd['product_price']);
    // $statement->bindParam(':product_qty', $newProd['product_qty']);

    // //change
    // $newProd['product_name'] = $_POST['productNew_name'];
    // $newProd['product_code'] = $_POST['productNew_code'];
    // $newProd['product_price'] = $_POST['productNew_price'];
    // $newProd['product_qty'] = $_POST['productNew_qty'];

    // //execute query
    // $statement->execute();
    // header("Location: ../inventory.php");
    // exit();
?>
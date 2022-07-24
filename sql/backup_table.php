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

    if($products && $invoices){
        foreach($products as $product){
            $product_name = $product['product_name'];
            $code = $product['code'];
            $product_price = $product['product_price'];
            $product_qty = $product['product_qty'];

            //check if already existed
            $sql_prod = "SELECT count(*) FROM backup_product WHERE product_name = '".$product_name."' ";
            $stmt_prod = $pdo->prepare($sql_prod);
            $stmt_prod->execute();
            $prod_check = count($stmt_prod->fetch(PDO::FETCH_ASSOC));
            echo $prod_check;

            //insert backup
            if($prod_check < 0){
                $prod_backup = 'INSERT INTO backup_product(product_name, code, product_price, product_qty)
                VALUES (:product_name, :code, :product_price, :product_qty)';

                $stmt_prod = $pdo->prepare($prod_backup);

                $prod_new = [
                    'product_name' => 'test',
                    'code' => 'aaa',
                    'product_price' => '999',
                    'product_qty' => '888',
                ];

                $stmt_prod->bindParam(':product_name', $prod_new['product_name']);
                $stmt_prod->bindParam(':code', $prod_new['code']);
                $stmt_prod->bindParam(':product_price', $prod_new['product_price']);
                $stmt_prod->bindParam(':product_qty', $prod_new['product_qty']);

                //change
                $prod_new['product_name'] = $product_name;
                $prod_new['code'] = $code;
                $prod_new['product_price'] = $product_price;
                $prod_new['product_qty'] = $product_qty;

                $stmt_prod->execute();
                echo "success";
                
            }
            else{
                echo "already existed";
            }
        }

        // foreach($invoices as $invoice){
        //     $order_id = $invoice['order_id'];
        //     $order_no = $invoice['order_no'];
        //     $product = $invoice['product'];
        //     $total = $invoice['total'];
        //     $cash = $invoice['cash'];
        //     $cash_change = $invoice['cash_change'];
        //     $created_at = $invoice['created_at'];
        //     //backup date

        //     //testing
        //     // echo $order_id."<br>";
        //     // echo $order_no."<br>";
        //     // echo $product."<br>";
        //     // echo $total."<br>";
        //     // echo $cash."<br>";
        //     // echo $cash_change."<br>";
        //     // echo $created_at."<br><br>";
        // }
    }
?>
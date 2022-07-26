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
    if($products && $invoices){
        foreach($products as $product){
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $code = $product['code'];
            $product_price = $product['product_price'];
            $product_qty = $product['product_qty'];

            //check if already existed
            $sql_prod = "SELECT * FROM backup_product WHERE product_name = '".$product_name."' ";
            $stmt_prod = $pdo->prepare($sql_prod);
            $stmt_prod->execute();
            $prod_check = $stmt_prod->rowCount();

            //insert product backup
            if($prod_check <= 0){
                $prod_backup = 'INSERT INTO backup_product(product_id,product_name, code, product_price, product_qty)
                VALUES (:product_id, :product_name, :code, :product_price, :product_qty)';

                $stmt_prod = $pdo->prepare($prod_backup);

                $prod_new = [
                    'product_id' => 4444,
                    'product_name' => 'test',
                    'code' => 'aaa',
                    'product_price' => 999,
                    'product_qty' => 888,
                ];

                $stmt_prod->bindParam(':product_id', $prod_new['product_id']);
                $stmt_prod->bindParam(':product_name', $prod_new['product_name']);
                $stmt_prod->bindParam(':code', $prod_new['code']);
                $stmt_prod->bindParam(':product_price', $prod_new['product_price']);
                $stmt_prod->bindParam(':product_qty', $prod_new['product_qty']);

                //change
                $prod_new['product_id'] = $product_id;
                $prod_new['product_name'] = $product_name;
                $prod_new['code'] = $code;
                $prod_new['product_price'] = $product_price;
                $prod_new['product_qty'] = $product_qty;

                $stmt_prod->execute();
                echo "Success!<br>";
                
            }
            else{
                echo "'".$product_name."' already existed!<br>";
            }
        }

        //backup invoice
        foreach($invoices as $invoice){
            $order_id = $invoice['order_id'];
            $order_no = $invoice['order_no'];
            $product = $invoice['product'];
            $total = $invoice['total'];
            $cash = $invoice['cash'];
            $cash_change = $invoice['cash_change'];
            $created_at = $invoice['created_at'];

            //check if already existed
            $sql_inv = "SELECT * FROM backup_invoice WHERE order_id = '".$order_id."' ";
            $stmt_inv = $pdo->prepare($sql_inv);
            $stmt_inv->execute();
            $inv_check = $stmt_inv->rowCount();

            //insert invoice backup
            if($inv_check <= 0){
                $prod_backup = 'INSERT INTO backup_invoice(order_id, order_no, product, total, cash, cash_change, created_at)
                VALUES (:order_id, :order_no, :product, :total, :cash, :cash_change, :created_at)';

                $stmt_inv = $pdo->prepare($prod_backup);

                $inv_new = [
                    'order_id' => 9999,
                    'order_no' => 8888,
                    'product' => 'sample',
                    'total' => 7777,
                    'cash' => 6667,
                    'cash_change' => 4444,
                    'created_at' => '2022-03-17 11:59:44'
                ];

                $stmt_inv->bindParam(':order_id', $inv_new['order_id']);
                $stmt_inv->bindParam(':order_no', $inv_new['order_no']);
                $stmt_inv->bindParam(':product', $inv_new['product']);
                $stmt_inv->bindParam(':total', $inv_new['total']);
                $stmt_inv->bindParam(':cash', $inv_new['cash']);
                $stmt_inv->bindParam(':cash_change', $inv_new['cash_change']);
                $stmt_inv->bindParam(':created_at', $inv_new['created_at']);

                //change
                $inv_new['order_id'] = $order_id;
                $inv_new['order_no'] = $order_no;
                $inv_new['product'] = $product;
                $inv_new['total'] = $total;
                $inv_new['cash'] = $cash;
                $inv_new['cash_change'] = $cash_change;
                $inv_new['created_at'] = $created_at;

                $stmt_inv->execute();
                echo "Success!<br>";
                
            }
            else{
                echo "'".$order_id."' already existed!<br>";
            }
        }
    }
?>
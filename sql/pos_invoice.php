<?php 
    $pdo = require 'connection.php';
    session_start();

    //
    $productAll = '';
    $processTotal = '';
    $processCash = '';
    $processChange = '';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // check if it has qty
        foreach($_SESSION['shopping_cart'] as $data){
            $prod_id = $data['item_id'];
            $prod_qty = $data['item_quantity'];

            // echo $data['item_id']."<br>";
            // echo $data['item_quantity']."<br>";
            $searchProd = "SELECT * FROM product WHERE product_id = ".$prod_id;
            $statement = $pdo->query($searchProd);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $result){
                    $old_qty = $result['product_qty'];
                    // reduce qty
                    $newQty = $old_qty - $prod_qty;

                    $data = ['product_qty' => 1];

                    $reduce_qty = "UPDATE product SET product_qty = :product_qty WHERE product_id = ".$prod_id;

                    $statement = $pdo->prepare($reduce_qty);

                    $statement->bindParam(':product_qty', $data['product_qty']);

                    // change
                    $data['product_qty'] = $newQty;

                    $statement->execute();
            }

        }

        // create invoice
        $sql = 'INSERT INTO invoice(product, total, cash, cash_change) 
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
        alert('Payment Finished! Print Invoice');
        window.location.href='../sales_report.php';
        </script>";
        exit();
    }

?>
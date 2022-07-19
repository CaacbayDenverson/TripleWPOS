<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple W Inventory</title>
    <link rel = "stylesheet" href = "css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> <!-- for boxicons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body id = "boody">
    <!--Navbar-->
    <?php require 'template/navbar.php'; ?>   

      <!-- front end header indicator -->
      <section class="home-section">
          <div class="text_permission" style = "margin-left: 25px;">Sales Report</div>
          <br>
      </section>
      <section class="service-section">
          <div class="text_permission">
          <div class="container">
        
        <div class="row g-4">
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect bounceInUp">

                    <h5 class="mt-4 mb-2">Overall Quantity</h5>
                    <?php 
                        $pdo = require 'sql/connection.php';
                        $totalQty = 0;

                        $showQty = "SELECT * FROM product";
                        $statement = $pdo->query($showQty);
                        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

                        foreach($products as $product){
                            $totalQty = $totalQty + $product['product_qty'];
                        }

                        echo "<h5 class='mt-4 mb-2'>".$totalQty." pc(s)</h5>";
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect">
                    <h5 class="mt-4 mb-2">Monthly Sales</h5>

                    <?php 
                        $sqlInvoice = "SELECT * FROM invoice";
                        $statement = $pdo->query($sqlInvoice);
                        $sales = $statement->fetchAll(PDO::FETCH_ASSOC);
                        $totalSales = 0;

                        foreach($sales as $sale){
                            $totalSales = $totalSales + $sale['total'];
                        }

                        echo "<h5 class='mt-4 mb-2'> ₱".number_format($totalSales)."</h5>";
                    ?>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect">
                    <h5 class="mt-4 mb-2">Item Stocks Reports</h5>

                    <?php 
                        $showProducts = "SELECT * FROM product";
                        $statement = $pdo->query($showProducts);
                        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                        $all = $statement->rowCount();

                        echo "<h5 class='mt-4 mb-2'> Total products: ".$all."</h5>";
                    ?>

                </div>
            </div>
        </div>
    </div>
          </div>
    
</section>
<br>
<section class="new-section">
          <div class="text_permission">Growth Report</div>
      </section>
      <section class="service-section">
        <div style="margin-left: 100px">
            <div class="row">
                <div class="col-6" style="padding: 50px;">
                <h4>Products</h4>
                    <canvas id="productChart" width="400" height="400"></canvas>
                    <?php 
                        $product = "SELECT product_name, product_qty FROM product";
                        foreach($pdo->query($product) as $row){
                            $product_name = $row['product_name'];
                            $product_qty = $row['product_qty'];
                            $data[] = array($product_name, $product_qty);
                        }
                    ?>
                </div>
                <div class="col-6" style="padding: 50px;">
                <h4>Monthly Report</h4>
                    <canvas id="salesChart" width="400" height="400"></canvas>
                    <?php
                        $monthly_sales = "SELECT total FROM invoice";
                        foreach($pdo->query($monthly_sales) as $row){
                            $total = $row['total'];
                            $data2[] = array($total);
                        }

                        $months = "SELECT created_at FROM invoice";
                        //format created_at to day
                        foreach($pdo->query($months) as $row){
                            $created_at = $row['created_at'];
                            $created_at = date('M', strtotime($created_at));
                            $data3[] = array($created_at);
                        }
                    ?>
                </div>
            </div>
        </div>
      </section>



    
      <script src="js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <script>
        const productChart = document.getElementById('productChart');
        const salesChart = document.getElementById('salesChart');

        const Chart1 = new Chart (productChart, {
            type: 'doughnut',
            data: {
                labels:[<?php foreach($data as $d){ echo '"'.$d[0].'",'; } ?>],
                datasets: [{
                    label: 'Product',
                    data: [<?php foreach($data as $d){ echo '"'.$d[1].'",'; } ?>],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                    ],
                    hoverOffset: 4
                }]
            },
        });

        const Chart2 = new Chart (salesChart, {
            type: 'line',
            data: {
                labels:[<?php foreach($data3 as $d){ echo '"'.$d[0].'",'; } ?>],
                datasets: [{
                    label: 'Monthly',
                    data: [<?php foreach($data2 as $d){ echo '"'.$d[0].'",'; } ?>],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                    ],
                    hoverOffset: 4
                }]
            },
        });
    </script>

<script>

</script>
    
</body>
</html>
<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <!--stuff-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body id = "boody">
    <!--Navbar-->
    <?php require 'template/navbar.php'; ?>
    
      <!-- front end header indicator -->
      <section class="home-section">
        <center>
          <div class="text_permission" style="color: #eb445a; font-size: 2rem; font-weight:600; margin-top: 60px; margin-right: 20px">SALES REPORT
        </div>
        </center>
      </section>
      <section class="service-section">
          <div class="text_permission">
          <div class="container">
        
        <div class="row g-4">
            <div class="col-lg-4 col-sm-6">
                <div class="service card-effect bounceInUp">
                <h5 class="mt-4 mb-2" style="color: #eb445a">Overall Quantity</h5>
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
                <h5 class="mt-4 mb-2" style="color: #eb445a">Total Sales</h5>

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
                <h5 class="mt-4 mb-2" style="color: #eb445a">Item Stocks Report</h5>

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
<section class="home-section">
        <center>
          <div class="text_permission" style="color: #eb445a; font-size: 2rem; font-weight:600; margin-top: 60px; margin-right: 20px">GROWTH REPORT
        </div>
        </center>
      </section>
      <section class="service-section">
        <div style="margin-left: 100px">
            <div class="row">
                <div class="col-6" style="padding: 50px;">
                <div class="service card-effect bounceInUp"> 
                <h3 style="color: #eb445a">Products</h3>
                    <canvas id="productChart" width="200" height="200"></canvas>
                    <?php 
                        $product = "SELECT product_name, product_qty FROM product";
                        foreach($pdo->query($product) as $row){
                            $product_name = $row['product_name'];
                            $product_qty = $row['product_qty'];
                            $data[] = array($product_name, $product_qty);
                        }
                    ?>
                </div>
                    </div>
                <div class="col-6" style="padding: 50px;">
                <div class="service card-effect bounceInUp">
                <h3 style="color: #eb445a">Recorded Sales</h3>

                    <canvas id="salesChart" style="position: relative; height: 400px; width: 400px;"></canvas>
                    <?php
                        //created_at must be grouped into month with the total sales
                        $sqlSales = "SELECT SUM(total) AS total, MONTH(created_at) AS month FROM invoice GROUP BY MONTH(created_at)";
                        foreach($pdo->query($sqlSales) as $row){
                            $total = $row['total'];
                            //month date format
                            $month = date("F", mktime(0, 0, 0, $row['month'], 10));
                            $data2[] = array($month, $total);
                        }

                        //created_at must be grouped into month with the total sales last year
                        $sqlSalesLastYear = "SELECT SUM(total) AS total, MONTH(created_at) AS month FROM invoice WHERE YEAR(created_at) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) GROUP BY MONTH(created_at)";
                        foreach($pdo->query($sqlSalesLastYear) as $row){
                            $total = $row['total'];
                            //month date format
                            $month = date("F", mktime(0, 0, 0, $row['month'], 10));
                            $data3[] = array($month, $total);
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
            data: {
                datasets: [{
                    type: 'line',
                    label: 'Monthly Sales',
                    data: [<?php foreach($data2 as $d){ echo '"'.$d[1].'",'; } ?>],
                    hoverOffset: 4,
                    borderColor: 'rgb(255, 99, 132)',
                    tension: 0.5,
                }],
                labels:[<?php foreach($data2 as $d){ echo '"'.$d[0].'",'; } ?>],
            },
        });
    </script>

<script>

</script>
    
</body>
</html>
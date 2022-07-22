<?php 
    require 'sql/account_check.php'; 
?>
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
    <div class="sidebar" style = "padding-left: 0;">
        <div class="logo-details">
            <i class='bx bxl-heart-square icon'></i>
            <div class="logo_name">
                <a href = "/admin/" style = "text-decoration: none; color: #fff;">Triple W</a>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list" style = "padding-left: 15px;">
          <!-- <li>
              <i class='bx bx-search' ></i>
             <input type="text" placeholder="Search...">
             <span class="tooltip">Search</span>
          </li> -->
            <li>
            <a href="dashboard.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
            <a href="inventory.php">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="links_name">Inventory</span>
            </a>
            <span class="tooltip">Inventory</span>
            </li>
            <li>
            <a href="profile.php">
                <i class='bx bx-user-circle' ></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="sales_report.php">
                    <i class='bx bx-receipt' ></i>
                    <span class="links_name">Sales Report</span>
                </a>
                <span class="tooltip">Sales Report</span>
            </li>
            <li>
                <a href="pos.php">
                    <i class='bx bx-laptop' ></i>
                    <span class="links_name">Point of Sale</span>
                </a>
                <span class="tooltip">Point of Sale</span>
            </li>
            <li>
                <a href="growth.php">
                    <i class='bx bx-chart' ></i>
                    <span class="links_name">Growth</span>
                </a>
                <span class="tooltip">Growth</span>
            </li>
            <a href = "sql/account_logout.php">
                <li class="profile">
                    <!-- <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_email">
                        <div class="name">User One</div>
                        <div class="email">userone@email.com</div>
                    </div>
                    </div> -->
                    <div class = "text_logout">Log-Out</div>
                    <i class='bx bx-log-out' id="log_out" ></i>
                </li>
            </a>
        </ul>
      </div>
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
                    <h5 class="mt-4 mb-2">Total Sales</h5>

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
                <div class="col-5" style="padding: 50px;">
                <h4>Products</h4>
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
                <div class="col-7" style="padding: 50px;">
                <h4>Recorded Sales</h4>
                    <canvas id="salesChart" style="position: relative; height: 400px; width: 600px;"></canvas>
                    <?php
                        //created_at must be grouped into month with the total sales
                        $sqlSales = "SELECT SUM(total) AS total, MONTH(created_at) AS month FROM invoice GROUP BY MONTH(created_at)";
                        foreach($pdo->query($sqlSales) as $row){
                            $total = $row['total'];
                            //month date format
                            $month = date("F", mktime(0, 0, 0, $row['month'], 10));
                            $data2[] = array($month, $total);
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
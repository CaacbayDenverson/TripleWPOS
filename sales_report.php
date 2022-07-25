<?php 
    require 'sql/account_check.php'; 
?>
<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple W</title>
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
                <i class='bx bx-cog' ></i>
                <span class="links_name">Configuration</span>
            </a>
            <span class="tooltip">Configuration</span>
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
                    <div class = "text_logout">Logout</div>
                    <i class='bx bx-log-out' id="log_out" ></i>
                </li>
            </a>
        </ul>
      </div>
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
            <div class="col-lg-3 col-sm-6">
                <div class="service card-effect bounceInUp">

                    <h5 style="color: #eb445a" class="mt-4 mb-2">Overall Quantity</h5>
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
            <div class="col-lg-3 col-sm-6">
                <div class="service card-effect">
                    <h5 style="color: #eb445a" class="mt-4 mb-2">Sales this Month</h5>

                    <?php 
                        //get total sales from invoice table and sum the total to the current month
                        $totalSales = 0;
                        $currentMonth = date('m');
                        $showSales = "SELECT * FROM invoice WHERE created_at LIKE '%$currentMonth%'";
                        $statement = $pdo->query($showSales);
                        $invoices = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach($invoices as $invoice){
                            $totalSales = $totalSales + $invoice['total'];
                        }

                        //condition where if total sales is 0 print no sales else print the total sales
                        if($totalSales == 0){
                            echo "<h5 class='mt-4 mb-2'>No Sales</h5>";
                        }else{
                            echo "<h5 class='mt-4 mb-2'> ₱".number_format($totalSales)."</h5>";
                        }
                    ?>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="service card-effect">
                    <h5 style="color: #eb445a" class="mt-4 mb-2">Total Sales</h5>

                    <?php 
                        //get total sales from invoice table and sum the total
                        $totalSales = 0;
                        $showSales = "SELECT * FROM invoice";
                        $statement = $pdo->query($showSales);
                        $invoices = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach($invoices as $invoice){
                            $totalSales = $totalSales + $invoice['total'];
                        }
                        echo "<h5 class='mt-4 mb-2'> ₱".number_format($totalSales)."</h5>";

                    ?>

                </div>
            </div>
            

            <div class="col-lg-3 col-sm-6">
                <div class="service card-effect">
                    <h5 style="color: #eb445a"class="mt-4 mb-2">Item Stocks Reports</h5>

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
          <div class="text_permission" style="color: #eb445a; font-size: 2rem; font-weight:600; margin-top: 60px; margin-right: 60px">SALES RECORD
        </div>
        </center>
      </section>
      <section class="service-section">
          <div style = "margin-left: 100px;" class="text_permission">
              <table style="width:93%; margin: 10px" id="datatableid" class="tblCustomers table table-bordered table-light">
                  <tr>
                      <th style="background: #eb445a;color:white;">INVOICE ID</th>
                      <th style="background: #eb445a;color:white;">PRODUCT</th>
                      <th style="background: #eb445a;color:white;">TOTAL</th>
                      <th style="background: #eb445a;color:white;">CASH</th>
                      <th style="background: #eb445a;color:white;">CHANGE</th>
                      <th style="background: #eb445a;color:white;">DATE</th>
                      <th style="background: #eb445a;color:white;">PRINT</th>
                  </tr>

                    <?php 
                        $showInvoice = "SELECT * FROM invoice";
                        $statement = $pdo->query($showInvoice);
                        $allInvoice = $statement->fetchAll(PDO::FETCH_ASSOC);

                        foreach($allInvoice as $invoice){
                            echo "<tr>";
                            echo "<td>".$invoice['order_id']."</td>";
                            echo "<td>".$invoice['product']."</td>";
                            echo "<td>".$invoice['total']."</td>";
                            echo "<td>".$invoice['cash']."</td>";
                            echo "<td>".$invoice['cash_change']."</td>";
                            echo "<td>".date('M d, Y', strtotime($invoice['created_at']))."</td>";
                            echo "<td>".'<a href="print_invoice.php?pdf=1&id='.$invoice["order_id"].'">PDF</a>'."</td>";
                            echo "</tr>";
                        }
                    ?>
                    <tr>
                        <td colspan="6" align="right"><h5>Total :</h5></td>
                        <td align="right">
                        <?php 
                        $sqlInvoice = "SELECT * FROM invoice";
                        $statement = $pdo->query($sqlInvoice);
                        $sales = $statement->fetchAll(PDO::FETCH_ASSOC);
                        $totalSales = 0;

                        foreach($sales as $sale){
                            $totalSales = $totalSales + $sale['total'];
                        }

                        echo "<h5> ₱".number_format($totalSales)."</h5>";
                    ?>
                        </td>
                    </tr>
                    
              </table>
              <input type="button" style="width:93%; margin: 10px;" class="btn btn-danger" id="btnExport" value="Export" />
              <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
              <script type="text/javascript">
                $("body").on("click", "#btnExport", function () {
                            html2canvas($('.tblCustomers')[0], {
                                onrendered: function (canvas) {
                                    var data = canvas.toDataURL();
                                    var docDefinition = {
                                        content: [{
                                            image: data,
                                            width: 500
                                        }]
                                    };
                                    pdfMake.createPdf(docDefinition).download("Sales-report.pdf");
                                }
                            });
                        });
            </script>
            
          </div>
      </section>



    
      <script src="js/script.js"></script>
      
      
    
</body>
</html>
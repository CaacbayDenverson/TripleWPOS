<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <!--stuff-->
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
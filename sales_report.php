<?php 
    require 'sql/account_check.php'; 
?>
<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <title>TripleW Sales Report</title>
</head>
<body id = "boody">
    <!--Navbar-->
    <?php require 'template/navbar.php'?>

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
          <div class="text_permission">Sales Record</div>
      </section>
      <section class="service-section">
          <div style = "margin-left: 100px;" class="text_permission">
              <table style="width:93%;" id="datatableid" class="tblCustomers table table-light">
                  <tr>
                      <th style="background: #eb445a;color:white;" width="8%;">Invoice ID</th>
                      <th style="background: #eb445a;color:white;">Product</th>
                      <th style="background: #eb445a;color:white;">Total</th>
                      <th style="background: #eb445a;color:white;">Cash</th>
                      <th style="background: #eb445a;color:white;">Change</th>
                      <th style="background: #eb445a;color:white;">Date</th>
                      <th style="background: #eb445a;color:white;">Print</th>
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
                            echo "<td>".$invoice['created_at']."</td>";
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
              <input type="button" style="width:93%" class="btn btn-danger" id="btnExport" value="Export" />
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
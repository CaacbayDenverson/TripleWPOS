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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(function(){
        $(document).on("click",".transferrows",function(){
            var getselectedvalues=$(".table1 input:checked").parents("tr").clone().appendTo($(".table2 tbody").add(getselectedvalues));
        })
    })
    </script>
</head>

<style>
    .lalagyan
{
    background-color: white;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 10px;
    padding:10px;
    border: 3px solid #eb445a;
    float: left;
    margin:1%;
}
.lalagyan:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
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
          <div class="text_permission">Point of Sale</div>
          <br>
      </section>
      <section class="inventory-section">
      <table style="margin-left:7%;width:90%;" class="table table1">
        <tr>
          <th scope="col">
            <div class="jumbotron">
                <div class="card-body">
                <form action="pos.php" method="post">
                <div class="sub-btn">
                <input type="text" style="width:50%;height:40px;" name="search" placeholder="Search Product...">
                <input class="btn btn-danger" type="submit" value="Search">
                </div>
                    
                </div>
                    <table style="width:90%;" id="datatableid" class="table table-light">
                        
                            <tr>
                                <th style="background: #eb445a;color:white;">ID</th>
                                <th style="background: #eb445a;color:white;">Product Name </th>
                                <th style="background: #eb445a;color:white;">Code</th>
                                <th style="background: #eb445a;color:white;">Price </th>
                                <th style="background: #eb445a;color:white;">Quantity </th>
                            </tr>

                            <?php
                                $pdo = require 'sql/connection.php';
                        
                            $keyword = '';

                            if(isset($_POST['search'])){
                                $keyword = $_POST['search'];
                            }


                            //main stuff
                            $showProduct = "SELECT * FROM product WHERE 
                            product_name LIKE :search OR product_id LIKE :search OR code LIKE :search
                            ORDER BY product_id ";
                            
                            $statement = $pdo->prepare($showProduct);
                            $statement->bindValue(':search', '%'. $keyword . '%');

                            $statement->execute();
                            $products = $statement->fetchAll(PDO::FETCH_ASSOC);

                                if($products){
                                    foreach($products as $product){
                                        echo "<tr>";
                                        echo '<td><input type="checkbox"></td>';
                                        echo "<td>".$product['product_name']."</td>";
                                        echo "<td>".$product['code']."</td>";
                                        echo "<td>".$product['product_price']."</td>";
                                        echo '<td><input type="number" value="1"></td>';
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </table>
                        <input type="button" value="Add to Order" class="btn btn-danger transferrows">
                    </form>
                </div>
                </div>


                </div>
            </div>
          </th>

          <!--ORDERS-->
          <th scope="col">
            <div class="jumbotron">
                <div class="card-body">
                <form action="pos.php" method="post">
                <h3>Orders</h3>
                    
                </div>
                    <table style="width:100%;" id="datatableid" class="table table-bordered table-light table2">
                        
                            <tr>
                                <th style="background: #eb445a;color:white;">Product Name </th>
                                <th style="background: #eb445a;color:white;">Code</th>
                                <th style="background: #eb445a;color:white;"> Quantity </th>
                                <th style="background: #eb445a;color:white;"> Price </th>
                                <th style="background: #eb445a;color:white;"> Total </th>
                                <th style="background: #eb445a;color:white;"> Action </th>
                            </tr>
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                            
                        </table>
                        <button style="float:right" class="btn btn-danger">Proceed Payment</button>
                    </form>
                </div>
                </div>


                </div>
                </div>
          </th>
        </tr>

      </table>
      </section>

</body>

</html>

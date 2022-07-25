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
    
</head>
<body id = "boody">
    <!--Navbar-->
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
                    <div class = "text_logout">Logout</div>
                    <i class='bx bx-log-out' id="log_out" ></i>
                </li>
            </a>
        </ul>
      </div>
      <!-- front end header indicator -->
      <section class="home-section">
        <center>
          <div class="text_permission" style="color: #eb445a; font-size: 2rem; font-weight:600; margin-top: 60px; margin-right: 20px">INVENTORY
        </div>
        </center>
      </section>
      <section class="inventory-section">
          <div class="text_permission">
          <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="color: #eb445a; font-weight:600; margin: 10px;"id="exampleModalLabel">ADD PRODUCT</h3>
                    <button type="button" style="background: #eb445a; color:white;" class="btn" data-dismiss="modal" aria-label="Close">
                        X
                    </button>
                </div>

                <form action="sql/inventory_insert.php" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="form-group" style="margin: 10px">
                            <input type="text" name="productNew_name" class="form-control" placeholder="Product Name" required>
                        </div>

                        <div class="form-group" style="margin: 10px">
                            <input type="text" name="productNew_code" class="form-control" placeholder="Product Code" required>
                        </div>

                        <div class="form-group" style="margin: 10px">
                            <input type="number" name="productNew_price" step="any" class="form-control" placeholder="Price" required>
                        </div>

                        <div class="form-group" style="margin: 10px">
                            <input type="number" name="productNew_qty" class="form-control" placeholder="Quantity" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" style="background: #eb445a; color:white;" name="insertdata" class="btn">Add Product</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Info </h5>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>

                <form action="sql/inventory_update.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="product_id" id="product_id" required>

                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required
                                placeholder="Enter New Product Name">
                        </div>

                        <div class="form-group">
                            <label> Product Code </label>
                            <input type="text" name="product_code" id="product_code" class="form-control" required
                                placeholder="Enter New Product Code">
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="product_price" step="any" id="product_price" class="form-control" required
                                placeholder="Enter New Price">
                        </div>

                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" name="product_qty" id="product_qty" class="form-control" required
                                placeholder="Enter New Quantity">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Product Data </h5>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>

                <form action="sql/inventory_delete.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="product_delete" id="delete_id">

                        <h4> Do you want to Delete this product?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> YES</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- VIEW POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="text" name="view_id" id="view_id">

                        <!-- <p id="fname"> </p> -->
                        <h4 id="fname"> <?php echo ''; ?> </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button> -->
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="">
        <div class="jumbotron">
                <div class="card-body">
                <form action="inventory.php" method="post">
                <div class="grid-container">
                 <div class="row justify-content-center">
                     <div class="col-8"><input type="text" style="margin:10px;" name="search" class="form-control" placeholder="Search"></div>
                     <div class="col-2"><input style="margin:10px; width:200px; background: #eb445a;color:white;" class="btn" type="submit" value="Search"></div>
                     <div class="col-2">
                         <button type="button" style="margin:10px; width:200px; background: #eb445a;color:white;" class="btn" data-toggle="modal" data-target="#studentaddmodal">
                                Add Product
                                         </button>
                     </div>
                 </div>
                </div>         
                    <table style=" margin: 10px" id="datatableid" class="table table-bordered table-light">
                        
                            <tr>
                                <th style="background: #eb445a;color:white;">ID</th>
                                <th style="background: #eb445a;color:white;">PRODUCT NAME</th>
                                <th style="background: #eb445a;color:white;">CODE</th>
                                <th style="background: #eb445a;color:white;">PRICE</th>
                                <th style="background: #eb445a;color:white;">QUANTITY</th>
                                <th style="background: #eb445a;color:white;">EDIT</th>
                                <th style="background: #eb445a;color:white;">DELETE</th>
                            </tr>

                            <?php
                                $pdo = require 'sql/connection.php';

                               //pagination
                               $perPage = 8;

                               //current page
                               // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                               $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                               $starting_limit = ($page - 1) * $perPage;

                               //calculate the total pages
                               $stmt = $pdo->query('SELECT count(*) FROM product');
                               $total_results = $stmt->fetchColumn();
                               $total_pages = ceil($total_results / $perPage);
                           
                               $keyword = '';

                               if(isset($_POST['search'])){
                                   $keyword = $_POST['search'];
                               }


                               //main stuff
                               $showProduct = "SELECT * FROM product WHERE 
                               product_name LIKE :search OR product_id LIKE :search OR code LIKE :search
                               ORDER BY product_id ASC LIMIT $starting_limit, $perPage";
                               
                               $statement = $pdo->prepare($showProduct);
                               $statement->bindValue(':search', '%'. $keyword . '%');

                               $statement->execute();
                               $products = $statement->fetchAll(PDO::FETCH_ASSOC);

                                if($products){
                                    foreach($products as $product){
                                        echo "<tr>";
                                        echo "<td>".$product['product_id']."</td>";
                                        echo "<td>".$product['product_name']."</td>";
                                        echo "<td>".$product['code']."</td>";
                                        echo "<td>".$product['product_price']."</td>";
                                        echo "<td>".$product['product_qty']."</td>";
                                        echo '<td>'.'<button type="button" style="width:100%;" class="btn btn-secondary editbtn">Edit</button>'.'</td>';
                                        echo '<td>'.'<button type="button" style="width:100%; background: #eb445a;color:white;" class="btn deletebtn">Delete</button>'.'</td>';
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </table>

                        <!-- Pages -->


                        <!-- New pagination -->
                    <?php if (ceil($total_pages / $perPage) > 0): ?>
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                            <li class="prev"><a href="inventory.php?page=<?php echo $page-1 ?>">Prev</a></li>
                            <?php endif; ?>

                            <?php if ($page-2 > 0): ?><li class="page"><a href="inventory.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				            <?php if ($page-1 > 0): ?><li class="page"><a href="inventory.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

                            <li class="currentpage"><a href="inventory.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                            <?php if ($page+1 < $total_pages+1): ?><li class="page"><a href="inventory.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				            <?php if ($page+2 < $total_pages+1): ?><li class="page"><a href="inventory.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

                            <?php if ($page < $total_pages): ?>
                            <li class="next"><a href="inventory.php?page=<?php echo $page+1 ?>">Next</a></li>
				            <?php endif; ?>
			            </ul>
			        <?php endif; ?>

                    </form>
                </div>
            </div>


        </div>
    </div>


    <script>
        console.log(<?php echo $total_pages ?>);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#product_id').val(data[0]);
                $('#product_name').val(data[1]);
                $('#product_code').val(data[2]);
                $('#product_price').val(data[3]);
                $('#product_qty').val(data[4]);
            });
        });
    </script>
        </div>
      </section>

      <script src="js/script.js"></script>
    
</body>
</html>
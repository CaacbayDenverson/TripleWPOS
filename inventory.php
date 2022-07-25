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
                <h3 style="color: #eb445a; font-weight:600; margin: 10px;"id="exampleModalLabel">EDIT PRODUCT</h3>
                    <button type="button" style="background: #eb445a; color:white;" class="btn" data-dismiss="modal" aria-label="Close">
                        X
                    </button>
                </div>

                <form action="sql/inventory_update.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="product_id" id="product_id" required>

                        <div class="form-group">
                            <h5 style="color: #eb445a; "> Product Name </h5>
                            <input type="text" name="product_name" id="product_name" class="form-control" required
                                placeholder="Enter New Product Name">
                        </div>

                        <div class="form-group">
                        <h5 style="color: #eb445a;"> Product Code </h5>
                            <input type="text" name="product_code" id="product_code" class="form-control" required
                                placeholder="Enter New Product Code">
                        </div>

                        <div class="form-group">
                        <h5 style="color: #eb445a;"> Price </h5>
                            <input type="text" name="product_price" step="any" id="product_price" class="form-control" required
                                placeholder="Enter New Price">
                        </div>

                        <div class="form-group">
                        <h5 style="color: #eb445a;"> Quantity </h5>
                            <input type="text" name="product_qty" id="product_qty" class="form-control" required
                                placeholder="Enter New Quantity">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" style="background: #eb445a; color:white;" class="btn">Update Product</button>
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
                <div class="row">
                    <div class="col-8">
                <div class="grid-container">
                 <div class="row justify-content-center">
                     <div class="col-8"><input type="text" style="margin:10px;" name="search" class="form-control" placeholder="Search"></div>
                     <div class="col-2"><input style="margin:10px; width:100%; background: #eb445a;color:white;" class="btn" type="submit" value="Search"></div>
                     <div class="col-2">
                         <button type="button" style="margin:10px; width:100%; background: #eb445a;color:white;" class="btn" data-toggle="modal" data-target="#studentaddmodal">
                                Add
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
                        </div>
                        <div class="col-4">
                            <canvas id="myChart" width="100" height="100"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'polarArea',
                                    data: {
                                        labels: [<?php foreach($data as $d){ echo '"'.$d[0].'",'; } ?>],
                                        datasets: [{
                                            label: 'Product Quantity',
                                            data: [<?php foreach($data as $d){ echo '"'.$d[1].'",'; } ?>],
                                            backgroundColor: [
                                                //with transparency using these colors
                                                'rgba(255, 99, 132, 0.5)',
                                                'rgba(54, 162, 235, 0.5)',
                                                'rgba(255, 206, 86, 0.5)',
                                                'rgba(75, 192, 192, 0.5)',
                                                'rgba(153, 102, 255, 0.5)',
                                                'rgba(255, 159, 64, 0.5)',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>

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
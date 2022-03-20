<!DOCTYPE html> 
<html lang="en" dir="ltr">

<?php 
    $pdo = require 'sql/connection.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple W Inventory</title>
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
            <a href="accounts.php">
                <i class='bx bx-user-circle' ></i>
                <span class="links_name">Accounts</span>
            </a>
            <span class="tooltip">Accounts</span>
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
            <a href = "/">
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
          <div class="text_permission">Inventory

        </div>
      </section>
      <section class="inventory-section">
          <div class="text_permission">
          <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Data </h5>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>

                <form action="insertcode.php" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Product Image </label>
                            <input type="hidden" name="size" value="1000000">
                            <div>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="price" class="form-control" placeholder="Enter Price">
                        </div>

                        <div class="form-group">
                            <label> Market By </label>
                            <input type="text" name="market" class="form-control" placeholder="Market By">
                        </div>
                        <div class="form-group">
                            <label> Generic Name </label>
                            <input type="text" name="generic_name" class="form-control" placeholder="Enter Generic Name">
                        </div>

                        <div class="form-group">
                            <label> Category </label>
                            <select class="txtb box" name="category">
                                <option value="Medical Supplies">Medical Supplies</option>
                                <option value="Mom And Baby">Mom And Baby</option>
                                <option value="Protection And Hygine">Protection And Hygine</option>
                                <option value="Covid Essential">Covid Essential</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Packaging Type </label>
                            <input type="text" name="packaging_type" class="form-control" placeholder="Enter Packaging Type">
                        </div>

                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                        </div>
                    </div>
                    <div style="width: 46%;margin-left:20%;">
                        <label><b>Expiration Date :</b></label>
                        <input type="date" name="expiration_date" value="2021-12-15">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
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

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="product_name" id="product_name" class="form-control"
                                placeholder="Enter New Product Name">
                        </div>

                        <div class="form-group">
                            <label> Price </label>
                            <input type="text" name="price" id="price" class="form-control"
                                placeholder="Enter New Price">
                        </div>

                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" name="quantity" id="quantity" class="form-control"
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
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
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
            <div class="sub-btn">
                <input type="text" style="width:40%" name="valueToSearch" placeholder="Search Product...">
                <input class="btn btn-primary" type="submit" name="search" value="Search">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                        ADD DATA
                    </button>
            </div>
                    
                </div>
                    <table style="width:100%;" id="datatableid" class="table table-bordered table-dark">
                        
                            <tr>
                                <th> ID</th>
                                <th>Image</th>
                                <th>Product Name </th>
                                <th> Price </th>
                                <th> Marketed By </th>
                                <th>Category</th>
                                <th> Quantity </th>
                                <th> EDIT </th>
                                <th> DELETE </th>
                            </tr>
                            <tr>
                                <td> Sample Cell </td>
                                <td> Sample Cell</td>
                                <td>Sample Cell </td>
                                <td>Sample Cell</td>
                                <td> Sample Cell </td>
                                <td>  Sample Cell</td>
                                <td>Sample Cell</td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>


        </div>
    </div>



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


    <!-- <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script> -->

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

                $('#update_id').val(data[0]);
                $('#product_name').val(data[2]);
                $('#price').val(data[3]);
                $('#quantity').val(data[8]);
            });
        });
    </script>
        </div>
      </section>

      <!--start-->

    
      <script src="js/script.js"></script>
    
</body>
</html>
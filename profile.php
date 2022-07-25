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
          <div class="text_permission" style="color: #eb445a; font-size: 2rem; font-weight:600; margin-top: 60px; margin-right: 20px">CONFIGURATION
        </div>
        </center>
      </section>
      <section class="inventory-section">
        <div class="text_permission">
            <div class="container">
             <div class="column" style="display: column;">
             <div class="col-12" style="margin: 20px">
                    <div class="card card-effect">
                        <div class="card-body">                
                            <div class="mb-3">
                                <form action="sql/account_update.php" method="POST">
                                    <h3>User Information</h3>
                                    <?php 
                                        $pdo = require 'sql/connection.php';
                                        $user = $_SESSION['user_id'];

                                        $secret1 = '';
                                        $secret2 = '';
                                        $secret3 = '';
                                        $recovery_code = '';

                                        $userSearch = "SELECT * FROM account WHERE acc_id=".$user;
                                        $statement = $pdo->query($userSearch);
                                        $userInfo = $statement->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($userInfo as $info){
                                            // echo "<h5 class='form-label'>Username</h5>";
                                            // echo "<input type='text' value='".$info['username']."' class='form-control' placeholder='' disabled>";
                                            // echo "<h5 class='form-label'>Name</h5>";
                                            // echo "<input type='text' value='".$info['name']."' name='name'  class='form-control' placeholder='' required>";
                                            // echo "<h5 class='form-label'>Email</h5>";
                                            // echo "<input type='email' value='".$info['email_address']."' name='email' class='form-control' placeholder='' required>";
                                            // //echo textarea of address
                                            // echo "<h5 class='form-label'>Address</h5>";
                                            // echo "<textarea class='form-control' name='address' rows='3' required>".$info['address']."</textarea>";
                                            // echo "<h5 class='form-label'>Contact Number</h5>";
                                            // echo "<input type='tel' value='".$info['contact_number']."' name='contact_number' class='form-control' maxlength='11' placeholder='' required>";
                                            // echo "<br>"
                                            
                                            //echo userinfo 2 columns per field except address which covers 2 rows using textarea
                                            echo "<div class='row'>";
                                            echo "<div class='col-6'>";
                                            echo "<h5 class='form-label'>Username</h5>";
                                            echo "<input type='text' value='".$info['username']."' class='form-control' placeholder='' disabled>";
                                            echo "</div>";
                                            echo "<div class='col-6'>";
                                            echo "<h5 class='form-label'>Name</h5>";
                                            echo "<input type='text' value='".$info['name']."' name='name'  class='form-control' placeholder='' required>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "<div class='row'>";
                                            echo "<div class='col-6'>";
                                            echo "<h5 class='form-label'>Email</h5>";
                                            echo "<input type='email' value='".$info['email_address']."' name='email' class='form-control' placeholder='' required>";
                                            echo "</div>";
                                            echo "<div class='col-6'>";
                                            echo "<h5 class='form-label'>Contact Number</h5>";
                                            echo "<input type='tel' value='".$info['contact_number']."' name='contact_number' class='form-control' maxlength='11' placeholder='' required>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "<div class='row'>";
                                            echo "<div class='col-12'>";
                                            echo "<h5 class='form-label'>Address</h5>";
                                            echo "<textarea class='form-control' name='address' rows='3' required>".$info['address']."</textarea>";
                                            echo "</div>";
                                            echo "</div>";
                                            //echo br
                                            echo "<br>";
                                            ;

                                            $recovery_code = $info['recovery_code'];

                                            $user_id = $info['acc_id'];
                                            $secret1 = $info['secret_1'];
                                            $secret2 = $info['secret_2'];
                                            $secret3 = $info['secret_3'];
                                        }
                                    ?>
                                    <input type="submit" style="width:49%;" class="btn btn-danger" value="Save Changes">
                                    <button type="button" style="width:49%;" class="btn btn-success editbtn">View Security Q.</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                                        
                    <div class="col-12" style="margin: 20px">
                    <div class="card card-effect">
                        <div class="card-body">                
                            <div class="mb-3">
                                <form action="sql/account_change_password.php" method="POST">
                                    <h3 class="form-label">Change Password</h3>

                                    <input type="password" name="oldPass" class="form-control" placeholder="Old Password" required><br>

                                    <input type="password" name="newPass" class="form-control" placeholder="New Password" required><br>

                                    <input type="password" name="confirmPass" class="form-control"  placeholder="Confirm New Password" required><br>

                                    <input type="submit" style="width:100%;" class="btn btn-danger" value="Change Password">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                                        
                <div class="col-12" style="margin: 20px">
                    <div class="card card-effect">
                        <div class="card-body">                
                            <div class="mb-3">
                                    <h3 class="form-label">Data Backup</h3>
                                    <a href="sql/backup_db.php" class="btn btn-success" style="float:right; margin: 10 px;">Backup Database</a>
                                    <a href="sql/backup_table.php" class="btn btn-warning" style="float:right; margin-right: 20px">Backup Invoice</a>
                                    <br>

                                    
                                    <table class="table table-striped table-bordered" style="margin:10px;">
                                        <thead>
                                            <tr>
                                                <th>Backup ID</th>
                                                <th>Backup Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                //group by backup_at and count(*) to get the number of backups per date php pdo query
                                                $pdo = require 'sql/connect.php';
                                                $sql = "SELECT backup_at, count(*) FROM backup_invoice GROUP BY backup_at";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach($result as $row){
                                                    echo "<tr>";
                                                    $backup_name = "backup_".$row['backup_at']."_".$user_id;
                                                    echo "<td>".$backup_name."</td>";
                                                    //backup_at month day year format   
                                                    echo "<td>".date("F j, Y", strtotime($row['backup_at']))."</td>";
                                                    echo "<td><a href='sql/backup_table.php?backup_name=".$backup_name."' class='btn btn-primary'>Download</a></td>";
                                                    
                                                }
                                                
                                                

                                            ?>
                                        </tbody>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <!--Modal Security Question-->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Security Question </h5>
                </div>
                <form action="sql/update_security.php" method="POST">
                    <input type="hidden" value="<?php echo $user_id?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label> What is your mother's maiden name ?  </label>
                            <input type="text" name="secret_1" class="form-control"
                                placeholder="" value="<?php echo $secret1 ?>" required>
                        </div>
                        <div class="form-group">
                            <label> When did the company start ? </label>
                            <input type="text" name="secret_2" class="form-control"
                                placeholder="" value="<?php echo $secret2 ?>" required>
                        </div>
                        <div class="form-group">
                            <label> What is the name of your first pet ? </label>
                            <input type="text" name="secret_3" class="form-control"
                                placeholder="" value="<?php echo $secret3 ?>" required>
                        </div>
                        <div class="form-group">
                            <label class='form-label'>Recovery Code</label>
                            <input type='password' id='recovery_code' value='<?php echo $recovery_code ?>' class='form-control' readonly>

                            <div class='form-check form-switch'>
                            <input class='form-check-input' type='checkbox' onclick='showCode()'>
                            <label class='form-check-label'>Show Recovery Code</label>
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-danger">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
      </section>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
      <script>
          function showCode() {
            var code = document.getElementById("recovery_code");
            
                if(code.type == "password"){
                    code.type = "text";
                }
                else{
                    code.type = "password";
                }
            }
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
    
</body>
</html>
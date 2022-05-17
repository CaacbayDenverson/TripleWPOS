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
            <a href = "sql/account_logout.php">
                <li class="profile">
                    <div class = "text_logout">Log-Out</div>
                    <i class='bx bx-log-out' id="log_out" ></i>
                </li>
            </a>
        </ul>
      </div>
      <!-- front end header indicator -->
      <section class="home-section">
          <div class="text_permission">Profile</div>
      </section>
      <section class="inventory-section">
        <div class="text_permission">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                    <div class="card card-effect">
                        <div class="card-body">
                            <div class="mb-3">
                                <form action="sql/account_update.php" method="POST">
                                    <?php 
                                        $pdo = require 'sql/connection.php';
                                        $user = $_SESSION['user_id'];

                                        $userSearch = "SELECT * FROM account WHERE acc_id=".$user;
                                        $statement = $pdo->query($userSearch);
                                        $userInfo = $statement->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($userInfo as $info){
                                            echo "<label class='form-label'>Username</label>";
                                            echo "<input type='text' value='".$info['username']."' class='form-control' placeholder='' disabled>";
                                            echo "<label class='form-label'>Name</label>";
                                            echo "<input type='text' value='".$info['name']."' name='name'  class='form-control' placeholder=''>";
                                            echo "<label class='form-label'>Address</label>";
                                            echo "<input type='text' value='".$info['address']."' name='address' class='form-control' placeholder=''>";
                                            echo "<label class='form-label'>Contact Number</label>";
                                            echo "<input type='tel' value='".$info['contact_number']."' name='contact_number' class='form-control' maxlength='11' placeholder=''>";
                                            echo "<br>";
                                        }
                                    ?>
                                    <input type="submit" class="btn btn-danger" value="Save Changes">
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col-6">
                    <div class="card card-effect">
                        <div class="card-body">
                            
                            <div class="mb-3">
                                <form action="sql/account_change_password.php" method="POST">
                                    <label class="form-label">Change Password</label>

                                    <input type="password" name="oldPass" class="form-control" placeholder="Enter Old Password" required><br>

                                    <input type="password" name="newPass" class="form-control" placeholder="Enter New Password" required><br>

                                    <input type="password" name="confirmPass" class="form-control"  placeholder="Confirm Password" required><br>

                                    <input type="submit" class="btn btn-danger" value="Change Password">
                                </form>
                            </div>

                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

    
      <script src="js/script.js"></script>
    
</body>
</html>
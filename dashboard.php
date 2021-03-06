<?php 
    require 'sql/account_check.php'; 
?>
<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple W Point of Sales</title>
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
      <div class = "home-section">
        <center>
          <div class="text">Welcome back!
          Today is <div class = "time"><span id='date'></span></div>
            </div>
        </center>
      </div>
      <br>
      <section class="service-section">
          <div class="text_permission">
          <div class="container">
        
        <div class="row g-4">
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect bounceInUp">
                    <h5 class="mt-1 mb-2">Inventory</h5>
                    <i style="color:#cf3c4f" class='bx bxs-shopping-bag-alt bx-lg'></i></br>
                    <a href="inventory.php" class="btn btn-danger">Click Me</a>
                </div>
                </center>
            </div>
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect">
                    <h5 class="mt-1 mb-2">Sales Report</h5>
                    <i style="color:#cf3c4f" class='bx bxs-receipt bx-lg'></i></br>
                    <a href="sales_report.php" class="btn btn-danger">Click Me</a>
                </div>
                </center>
            </div>
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect bounceInUp">
                    <h5 class="mt-1 mb-2">Point Of Sale</h5>
                    <i style="color:#cf3c4f" class='bx bx-laptop bx-lg'></i></br>
                    <a href="pos.php" class="btn btn-danger">Click Me</a>
                </div>
                </center>
            </div>
            <!-- for spacing -->
            <div class="col-lg-4 col-sm-6">
                <!-- <center>
                <div class="service card-effect">
                    <h5 class="mt-1 mb-2">Log out</h5>
                    <i class='bx bx-log-out bx-lg'></i></br>
                    <button class="btn btn-primary">Click Me</button>
                </div>
                </center> -->
            </div>
            <!-- for spacing -->
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect">
                    <h5 class="mt-1 mb-2">Profile</h5>
                    <i style="color:#cf3c4f" class='bx bx-user-circle bx-lg'></i></br>
                    <a href="profile.php" class="btn btn-danger">Click Me</a>
                </div>
                </center>
            </div>
            <!-- for spacing -->
            <div class="col-lg-4 col-sm-6">
                <!-- <center>
                <div class="service card-effect">
                    <h5 class="mt-1 mb-2">Log out</h5>
                    <i class='bx bx-log-out bx-lg'></i></br>
                    <button class="btn btn-primary">Click Me</button>
                </div>
                </center> -->
            </div>
            <!-- for spacing -->
        </div>
    </div>
          </div>
    
</section>
      <script src="js/script.js"></script>
    
    
</body>
</html>
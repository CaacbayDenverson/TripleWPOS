<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <title>Triple W Dashboard</title>
</head>

<body id = "boody">
    <!--Navbar-->
    <?php require 'template/navbar.php'; ?>   
    
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
                <div class="service card-effect bounceInUp" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Inventory</h5>
                    <i style="color:#fff" class='bx bxs-shopping-bag-alt bx-lg'></i></br>
                    <a href="inventory.php" class="btn btn-warning"">Click Me</a>
                </div>
                </center>
            </div>
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Sales Report</h5>
                    <i style="color:#fff" class='bx bxs-receipt bx-lg'></i></br>
                    <a href="sales_report.php" class="btn btn-warning">Click Me</a>
                </div>
                </center>
            </div>
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect bounceInUp" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Point Of Sale</h5>
                    <i style="color:#fff" class='bx bx-laptop bx-lg'></i></br>
                    <a href="pos.php" class="btn btn-warning">Click Me</a>
                </div>
                </center>
            </div>
            <!-- for spacing -->
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Growth</h5>
                    <i style="color:#fff" class='bx bx-chart bx-lg'></i></br>
                    <a href="growth.php" class="btn btn-warning">Click Me</a>
                </div>
                </center>
            </div>
            <!-- for spacing -->
            <div class="col-lg-4 col-sm-6">
                <center>
                <div class="service card-effect" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Profile</h5>
                    <i style="color:#fff" class='bx bx-user-circle bx-lg'></i></br>
                    <a href="profile.php" class="btn btn-warning">Click Me</a>
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
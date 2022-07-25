<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <!--stuff-->
</head>

<body id = "boody">
    <!--Navbar-->
    <?php require 'template/navbar.php'; ?>    

      <!-- front end header indicator -->
      <!-- <div class = "home-section"> <center>     
        <div class = "time"><span id='date'></span></div>
            </div>
        </center> 
      </div>  -->
       <section class="home-section">
        <center>
          <div class="text_permission" style="color: #eb445a; font-size: 2rem; font-weight:600; margin-top: 60px; margin-right: 20px">DASHBOARD
        </div>
        </center>
      </section>
      <section class="inventory-section">
          <div class="text_permission">
      <div class="container" style="margin-top: 60px;">
        <div class="row g-4">
            <div class="col-xl-4 col-xl-6">
                <center>
                <div class="service card-effect bounceInUp" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Inventory</h5>
                    <i style="color:#fff" class='bx bxs-shopping-bag-alt bx-lg'></i></br>
                    <a href="inventory.php" class="btn btn-warning"">Click Me</a>
                </div>
                </center>
            </div>
            <div class="col-xl-4 col-xl-6">
                <center>
                <div class="service card-effect" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Sales Report</h5>
                    <i style="color:#fff" class='bx bxs-receipt bx-lg'></i></br>
                    <a href="sales_report.php" class="btn btn-warning">Click Me</a>
                </div>
                </center>
            </div>
            <div class="col-xl-4 col-xl-6">
                <center>
                <div class="service card-effect bounceInUp" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Point Of Sale</h5>
                    <i style="color:#fff" class='bx bx-laptop bx-lg'></i></br>
                    <a href="pos.php" class="btn btn-warning">Click Me</a>
                </div>
                </center>
            </div>
            <!-- for spacing -->
            <div class="col-xl-4 col-xl-6">
                <center>
                <div class="service card-effect" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Growth</h5>
                    <i style="color:#fff" class='bx bx-chart bx-lg'></i></br>
                    <a href="growth.php" class="btn btn-warning">Click Me</a>
                </div>
                </center>
            </div>
            <!-- for spacing -->
            <div class="col-xl-12 col-xl-6">
                <center>
                <div class="service card-effect" style="background: #cf3c4f; color:#fff">
                    <h5 class="mt-1 mb-2">Configuration</h5>
                    <i style="color:#fff" class='bx bx-cog bx-lg'></i></br>
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
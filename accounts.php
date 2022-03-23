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
          <div class="text_permission">Accounts</div>
          <br>
      </section>



      <div class="">
        <center>
        <div class="jumbotron">
                <div class="card-body">
                <form action="inventory.php" method="post">
            <div class="sub-btn">
                <input type="text" style="width:40%" name="valueToSearch" placeholder="Search User...">
                <input class="btn btn-primary" type="submit" name="search" value="Search">


            </div>
                    
                </div>
                <center>
                    <table style="width:80%;" id="datatableid" class="table table-bordered table-dark">
                        
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Admin Power </th>
                                <th>Edit </th>
                                <th>Delete </th>
                            </tr>

                            <?php 
                                $pdo = require 'sql/connection.php';

                                // $showAccounts = "SELECT * 
                                // CASE
                                //     WHEN admin_power = 1 THEN 'YES'
                                //     ELSE 'NO'
                                //     END AS acc_power
                                // FROM account";

                                //replacement of 1/0 to YES/NO
                                // SELECT * CASE WHEN admin_power = 1 THEN 'YES' ELSE 'NO' END AS acc_power FROM account
                                // SELECT * FROM account CASE admin_power WHEN 1 THEN 'YES'   

                                $showAccounts = "SELECT * FROM account";

                                $statement = $pdo->query($showAccounts);
                                $accounts = $statement->fetchAll(PDO::FETCH_ASSOC);

                                if($accounts){
                                    foreach($accounts as $account){
                                        echo "<tr>";
                                        echo "<td>".$account['acc_id']."</td>";
                                        echo "<td>".$account['username']."</td>";
                                        echo "<td>".$account['password']."</td>";
                                        echo "<td>".$account['admin_power']."</td>";
                                        // echo "<td>".$account['acc_power']."</td>";
                                        echo '<td>'.'<button type="button" class="btn btn-success editbtn">EDIT</button>'.'</td>';
                                        echo '<td>'.'<button type="button" class="btn btn-danger deletebtn"> DELETE </button>'.'</td>';
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </table>
                    </form>
                    </center>
                </div>
            </div>


        </div>
    </center>
    </div>

    
      <script src="js/script.js"></script>
    
</body>
</html>
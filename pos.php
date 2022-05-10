<?php 
session_start();
$user_id = $_SESSION['user_id'];
$connect = mysqli_connect("localhost", "root", "", "triplew");


if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="pos.php"</script>';
			}
		}
	}
}

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

<style>
.payment-section {
  padding-bottom: 120px;
  position: relative;
  /* background: #fff; */
  margin-top:25%;
  background: rgb(255, 255, 255);
  top: 0;
  left: 0;
  width: 100%;
  transition: all 0.5s ease;
  padding:5px;
}
.sidebar.open ~ .payment-section{
  left: 150px;
  width: calc(100% - 250px);
}
.payment-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px;
}
.payment-section .text_permission{
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  padding-left: 100px;
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
          <div class="text_permission">

		  	<form action="pos.php" method="post">
			  <select name="prod_chosen">
                <option value="">--Choose a product--</option>
			<?php
                $pdo = require 'sql/connection.php';

				$prod_name = '';
				$qty = 0;
				$total = 0;
				$get_id = '';

                $sql = "SELECT * FROM product";
                $statement = $pdo->query($sql);
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach($products as $product){
                    echo "<option value='".$product['product_id']."'>".$product['product_name']."</option>";
                }
            ?>
            	</select>

				<input type="number" style="width:5%" name="chosen_qty" placeholder="1">

				<input type="submit" class="btn btn-danger" value="Add Product">
			</form>
        
		  	<!-- Total -->
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th style="background:#eb445a;color:#fff" width="40%">Product Name</th>
						<th style="background:#eb445a;color:#fff" width="10%">Quantity</th>
						<th style="background:#eb445a;color:#fff" width="20%">Price</th>
						<th style="background:#eb445a;color:#fff" width="15%">Total</th>
					</tr>
				
					<form>
						<?php 
							if($_SERVER["REQUEST_METHOD"] == "POST"){
								$get_id = $_POST['prod_chosen'];
								$get_qty = $_POST['chosen_qty'];

								// get them
								$sql = "SELECT * FROM product WHERE product_id=".$get_id;
								$statement = $pdo->query($sql);
								$products = $statement->fetchAll(PDO::FETCH_ASSOC);

						?>

						<?php 
							foreach($products as $product){
								echo "<tr>";
								echo "<th><input type='text' name='product_name' readonly value='".$product['product_name']."'></th>";
								echo "<th><input type='number' name='product_qty' value='".$get_qty."' readonly></th>";
								echo "<th><input type='number' name='product_price' value='".$product['product_price']."' readonly step='any'></th>";
								echo "<th><input type='number' name='total' id='total' readonly step='any' value='".$product['product_price']*$get_qty."'></th>";
								echo "</tr>";
							}
						?>

						<?php
							}
						?>
					</form>
				    
				</table>
				<section class="payment-section">
					<div style="float:right">
						<th><input type='number' name='cash' id='cash' placeholder='Cash' step='any'></th>
						<th><input type='number' name='change' id='change' readonly placeholder='Change' step='any'></th>
						<th><button class='btn btn-danger' onclick='process()'>Calculate</button></th>
					</div>	
					<br>
					<br>
					<button type="submit" style="width:100%;" id='proceed' name="updatedata" class="btn btn-danger">PROCEED PAYMENT</button>
				</section>

			</div>
		</div>
        </div>
      </section>
	  <script>
		  document.getElementById('proceed').disabled = true;

		  function process(){
			var cash = parseFloat(document.getElementById('cash').value);
			var total = parseFloat(document.getElementById('total').value);
			var change = parseFloat(document.getElementById('change').value);
			var output = parseFloat(0);

			output = cash - total;
			console.log(output);
			

			  document.getElementById('change').value = parseFloat(output).toFixed(2);
			  document.getElementById('proceed').disabled = false;
		  }
	  </script>

      <script src="js/script.js"></script>
    
</body>
</html>
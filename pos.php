<?php 
require 'sql/account_check.php'; 

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
            echo '<script>window.location="pos.php"</script>';
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
    <!--Start For Searchbar-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
    <!--End For Searchbar-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> <!-- for boxicons -->

</head>

<style>
    .lalagyan
{
    background-color: white;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 10px;
    padding:10px;
    border: 3px solid #eb445a;
    float: left;
    margin:1%;
}
.lalagyan:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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
      <section class="home-section">
          <div class="text_permission">Point of Sale</div>
          <br>
      </section>
      <section class="inventory-section">
          <div class="text_permission">

              <table style="width:100%;" id="datatableid" class="table">
                  <tr>
                      <th scope="col"> <!--Inventory Search and Table of items-->
                        <div class="sub-btn">
                            <input type="text" style="width:30%;height:40px;" name="search" id="myInput" placeholder="Search Product...">
                        </div>
                         <br>
            <table style="width:90%;" id="datatableid" class="table table-light">
                        <tr>
                            <th style="background: #eb445a;color:white;">Product Name</th>
                            <th style="background: #eb445a;color:white;">Price</th>
                            <th width="10%;" style="background: #eb445a;color:white;">Quantity</th>
                            <th style="background: #eb445a;color:white;"></th>
                            <th style="background: #eb445a;color:white;"></th>
                            <th style="background: #eb445a;color:white;">Add</th>
                        </tr>   
                    <?php
                        $query = "SELECT * FROM product ORDER BY product_id ASC";
                        $result = mysqli_query($connect, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>
                    <tbody id="myTable">
                    <tr>
                        <form method="post" action="pos.php?action=add&id=<?php echo $row["product_id"]; ?>">
                                <td><h4 class=""><?php echo $row["product_name"]; ?></h4></td>

                                <td><h4 class="text-danger">₱ <?php echo $row["product_price"]; ?>.00</h4></td>

                                <td><input type="text" name="quantity" value="1" class="form-control" /></td>

                                <td><input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" /></td>

                                <td><input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" /></td>

                                <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-danger" value="Add to Cart" /></td>

                        </form>
                        </tr>
                    
                <?php
                        }
                    }
                ?>
                    </tbody>
                        
                <!--Order details-->
                    </table>

                      </th>

                      <th scope="col"><!--Orders and Reciept-->
                      <div style="clear:both"></div>
			<br>
			<h3>Order Details</h3>
			<div class="table-responsive">
                    <table style="width:600px" class="table table-light">
                        <tr>
                            <th style="background: #eb445a;color:white;">Product Name</th>
                            <th width="10%" style="background: #eb445a;color:white;">Quantity</th>
                            <th style="background: #eb445a;color:white;">Price</th>
                            <th width="20%" style="background: #eb445a;color:white;">Total</th>
                            <th style="background: #eb445a;color:white;">Action</th>
                        </tr>
                        <?php
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $keys => $values)
                            {
                        ?>
                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td>₱ <?php echo $values["item_price"]; ?></td>
                            <td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                            <td><a href="pos.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                        <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                        ?>
                        <form action="sql/pos_invoice.php" method="post">
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td align="right">
                                <input type="number" name="processTotal" id="total_id" value="<?php echo number_format($total, 2); ?>" class="form-control" placeholder="₱ " readonly></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">Enter Cash</td>
                            <td align="right"><input type="number" step="any" name="processCash" id="cash_id" class="form-control" 
                                    placeholder="0"></td>

                        </tr>
                        <tr>
                            <td colspan="3" align="right">Change :</td>
                            <td align="right"><input type="number" step="any" name="processChange" id="resultpayment" class="form-control" readonly></td>
                        </tr>
                        <?php
                        }
                        ?>
                        
                        <tr>
                            <td colspan="5"><textarea class='form-control' name='productAll' readonly hidden><?php
                            $countItem = count($_SESSION['shopping_cart']);
                            $counting = 1;

                            foreach($_SESSION['shopping_cart'] as $data){
                                // neatlook output
                                $template = $data['item_name']." P".$data['item_price']." ".$data['item_quantity']." pc(s)";

                                if($countItem > $counting){
                                    echo $template.", ";
                                    $counting++;
                                }
                                else{
                                    echo $template;
                                }
                            }
                            ?></textarea>
                            </td>
                        </tr>
                    </table>
                    
                    <input type="submit" class="btn btn-danger" id="proceed" value="PROCEED PAYMENT">
                </form>

                <button style="width:40%;" name="updatedata" onclick="checkpayment();" class="btn btn-danger paymentbtn">Calculate</button>
                <a href="sql/pos_clear.php"><button class="btn btn-danger">Clear</button></a>
                <script>
                    $proceed = document.getElementById("proceed").disabled = true;
                    
                    function checkpayment()
                    {
                        var total = parseFloat(document.getElementById('total_id').value);
                        var cash = parseFloat(document.getElementById('cash_id').value);
                         
                        var acceptpayment = cash - total ;
                        acceptpayment1 = parseFloat(acceptpayment);

                        if (cash >= total)
                        {
                            document.getElementById('resultpayment').value = acceptpayment1;
                            $proceed = document.getElementById("proceed").disabled = false;
                        }

                        else
                        {
                            document.getElementById('resultpayment').value = acceptpayment1;
                            $proceed = document.getElementById("proceed").disabled = true;
                        }
            
                    }
                    
                </script>
			</div>
                      </th>
                  </tr>
              </table>
      </section>



      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function () {

            $('.paymentbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
            });
        });
    </script>


    
      <script src="js/script.js"></script>
    
</body>
</html>

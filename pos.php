<?php 
require 'sql/account_check.php'; 

$connect = mysqli_connect("localhost", "root", "", "triplew");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
        // if order qty > stocks
        if($_POST['quantity'] > $_POST['hidden_stocks']){
            echo '<script>alert("Item QTY is greater than stocks!")</script>';
            echo '<script>window.location="pos.php"</script>';
        }
        else{
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
<title>TripleW POS</title>
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
</head>

<!--Delete if not using-->
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
    <!--Navbar-->
    <?php require 'template/navbar.php'?> 

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
                            <th style="background: #eb445a;color:white;">Stocks</th>
                            <th width="10%;" style="background: #eb445a;color:white;">Quantity</th>
                            <th style="background: #eb445a;color:white;"></th>
                            <th style="background: #eb445a;color:white;"></th>
                            <th colspan="2" style="background: #eb445a;color:white;">Add</th>
                        </tr>   
                    <?php
                        $query = "SELECT * FROM product ORDER BY product_id ASC";
                        $result = mysqli_query($connect, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {

                                if($row['product_qty'] > 0){
                    ?>
                    <tbody id="myTable">
                    <tr>
                        <form method="post" action="pos.php?action=add&id=<?php echo $row["product_id"]; ?>">
                                <td><h4 class=""><?php echo $row["product_name"]; ?></h4></td>

                                <td><h4 class="text-danger">₱ <?php echo $row["product_price"]; ?>.00</h4></td>

                                <td><h4 class="text-danger"><?php echo $row["product_qty"]; ?> pc(s)</h4></td>

                                <td><input type="text" name="quantity" value="1" class="form-control" /></td>

                                <td><input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" /></td>

                                <td><input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" /></td>

                                <td><input type="hidden" name="hidden_stocks" value="<?php echo $row["product_qty"]; ?>" /></td>

                                <td><input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-danger" value="Add to Cart" /></td>

                        </form>
                        </tr>
                    
                <?php
                            }
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
                            <td>₱ <?php echo $values["item_quantity"] * $values["item_price"];?></td>
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
                                <input type="number" name="processTotal" id="total_id" step="any" value="<?php echo $total; ?>" class="form-control" placeholder="₱ " readonly></td>
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

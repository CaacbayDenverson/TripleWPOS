<?php 
    require 'sql/account_check.php'; 
?>
<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <title>TripleW Profile</title>
</head>
<body id = "boody">
    <!--Navbar-->
    <?php require 'template/navbar.php'?> 

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

                                        $secret1 = '';
                                        $secret2 = '';
                                        $secret3 = '';
                                        $recovery_code = '';

                                        $userSearch = "SELECT * FROM account WHERE acc_id=".$user;
                                        $statement = $pdo->query($userSearch);
                                        $userInfo = $statement->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($userInfo as $info){
                                            echo "<label class='form-label'>Username</label>";
                                            echo "<input type='text' value='".$info['username']."' class='form-control' placeholder='' disabled>";
                                            echo "<label class='form-label'>Name</label>";
                                            echo "<input type='text' value='".$info['name']."' name='name'  class='form-control' placeholder='' required>";
                                            echo "<label class='form-label'>Address</label>";
                                            echo "<input type='text' value='".$info['address']."' name='address' class='form-control' placeholder='' required>";
                                            echo "<label class='form-label'>Contact Number</label>";
                                            echo "<input type='tel' value='".$info['contact_number']."' name='contact_number' class='form-control' maxlength='11' placeholder='' required>";
                                            echo "<br>";

                                            $recovery_code = $info['recovery_code'];

                                            $user_id = $info['acc_id'];
                                            $secret1 = $info['secret_1'];
                                            $secret2 = $info['secret_2'];
                                            $secret3 = $info['secret_3'];
                                        }
                                    ?>
                                    <input type="submit" class="btn btn-danger" value="Save Changes">
                                    <button type="button" style="width:40%;" class="btn btn-success editbtn">View Security Q.</button>
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
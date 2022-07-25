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

</head>
<style>
    .card{
        padding:2%;
        }
    .card:hover{
        box-shadow: 0 8px 22px rgba(0,0,0,0.3);
    }
    .hero {
    background-image: url(images/hero-bg.jpg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    position: relative;
    z-index: 2;
}

.hero::after {
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(21, 20, 51, 0.5);
    z-index: -1;
}
</style>
<body>
   <!--Modal Security Question-->
   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Forgot Password </h5>
                </div>

                <form action="sql/inventory_update.php" method="POST">

                    <div class="modal-body">

                        <div class="form-group">
                            <label> Username  </label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Enter New Password  </label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Confirm Pasword  </label>
                            <input type="password" name="confirmPass" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Reset Password" class="btn btn-danger">
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="hero vh-100 d-flex align-items-center">
        <div class="container card" style="background:white;border-radius:20px;">
            <div class="row">
                <div class="col" style="text-align:center;">
                    <h4 style="text-transform:uppercase">Triple W Motorcycle Parts & Accessories</h4>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="images/logo.png" style="width:500px;margin-left:10%;">
                </div>
                <div class="col">
                    <h4 style="margin-top:8%;">Forgot Password</h4>
                    <br>

                    <form action="forgot_password1.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label">Enter your Username</label>
                                <input type="text" name="usernameSearch" class="form-control" required>
                            </div>

                            <?php
                                $pdo = require 'sql/connection.php';
                                session_start();

                                $userInput = '';

                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $userInput = $_POST['usernameSearch'];

                                    $userSearch = "SELECT * FROM account WHERE username = '".$userInput."' ";
                                    $statement = $pdo->query($userSearch);
                                    $userResult = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    $count = $statement->rowCount();

                                    // if exist
                                    if($count > 0){
                                        foreach($userResult as $result){
                                            $_SESSION['userID'] = $result['acc_id'];
                                            $_SESSION['secret1'] = $result['secret_1'];
                                            $_SESSION['secret2'] = $result['secret_2'];
                                            $_SESSION['secret3'] = $result['secret_3'];
                                            $_SESSION['recovery_code'] = $result['recovery_code'];
                                        }

                                        echo "<script>
                                        window.location.href='forgot_password2.php';
                                        </script>";
                                    }
                                    else{
                                        // no exist
                                        echo "<script>
                                        alert('Username is incorrect');
                                        </script>";
                                    }
                                }
                            ?>
                            <input type="submit" name="insertdata" style="width:100%;padding:10px;float:right;border-radius:50px;" class="btn btn-danger">
                            <a href="forgot_password.php" class="btn btn-danger" style="width:100%;padding:10px;float:right;border-radius:50px;margin-top:5px;">BACK</a>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();


            });
        });
    </script>

</body>
</html>
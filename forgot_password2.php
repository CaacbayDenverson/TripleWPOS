<?php session_start(); ?>
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
                    <form action="forgot_password2.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Select Security Question</label>
                                <select class='form-select' name="choice" aria-label='Default select example' required>
                                    <option value=''>===Please select a secret question===</option>
                                    <option value='recovery'>What is your recovery code ?</option>
                                    <option value='secret_1'>What is your mother's maiden name ?</option>
                                    <option value='secret_2'>When did the company start ?</option>
                                    <option value='secret_3'>What is the name of your first pet ?</option>
                                </select>
                             </div>
                             
                            <div class="mb-3">
                                <label class="form-label">Enter your Answer</label>
                                <input type="text" name="answer" maxlength='6' class="form-control" required>
                            </div>
                    
                            <?php
                                $pdo = require 'sql/connection.php';

                                $userID = $_SESSION['userID'];
                                $choice = '';
                                
                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $choice = $_POST['choice'];
                                    
                                    if($choice == 'recovery'){
                                        if($_POST['answer'] == $_SESSION['recovery_code']){
                                            echo "<script>window.location.href='forgot_password3.php';</script>";
                                        }
                                        else{
                                            echo "<script>alert('Recovery Code is incorrect!')</script>";
                                        }
                                    }
                                    else if($choice == 'secret_1'){
                                        if($_POST['answer'] == $_SESSION['secret1']){
                                            echo "<script>window.location.href='forgot_password3.php';</script>";
                                        }
                                        else{
                                            echo "<script>alert('Secret Question Answer is incorrect!')</script>";
                                        }
                                    }
                                    else if($choice == 'secret_2'){
                                        if($_POST['answer'] == $_SESSION['secret2']){
                                            echo "<script>window.location.href='forgot_password3.php';</script>";
                                        }
                                        else{
                                            echo "<script>alert('Secret Question Answer is incorrect!')</script>";
                                        }

                                    }
                                    else if($choice == 'secret_3'){
                                        if($_POST['answer'] == $_SESSION['secret3']){
                                            echo "<script>window.location.href='forgot_password3.php';</script>";
                                        }
                                        else{
                                            echo "<script>alert('Secret Question Answer is incorrect!')</script>";
                                        }
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
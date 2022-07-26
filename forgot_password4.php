<?php session_start(); ?>
<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple W</title>
    <link rel = "stylesheet" href = "css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> <!-- for boxicons -->

</head>
<style>
    .card{
        padding:2%;
        max-width: 45%;
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

.logo{
    height: 320px;
    max-width: 320px;
    margin-left: auto;
    margin-right: auto;
    left: 0;
    right: 0;
    top:0;
    position: absolute;
}

.modcont{
    margin-top:13em !important;
}

h4{
    text-align: center;
}
</style>
<body>
   <!--Pin Code-->

    <div class="hero vh-100 d-flex align-items-center">
        <div class="container card" style="background:white;opacity:0.9;border-radius:20px;">
            <div class="row">
                <div class="col" style="text-align:center;">
                    <img src="images/logo.png" class="logo">
                </div>
            </div>
            <div class="row modcont">
                <div class="col">
                    <h4 style="margin-top:8%;">Enter Pin Code</h4>
                    <br>
                    <form action="forgot_password4.php" method="POST">
                            <div class="mb-3">
                                <select class='form-select' name="choice" aria-label='Default select example' hidden required>
                                    <option value='recovery'>What is your Pin code ?</option>
                                </select>
                             </div>
                             
                            <div class="mb-3">
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


</body>
</html>
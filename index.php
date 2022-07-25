<?php
$pdo = require 'sql/connection.php';
session_start();

    $displayform = False;
    $displaylogin = False;

    $sqlAdmin ="SELECT * FROM account";
    $statement = $pdo->query($sqlAdmin);
    $admin = $statement->fetchAll(PDO::FETCH_ASSOC);
    $admin_count = $statement->rowCount();
    if($admin_count < 1)
    {
        $displayform = True;
    }
    else
    {
        
        
        $displaylogin = True;
    }
?>

<!DOCTYPE html> 
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Triple W Point of Sales</title>
        <link rel = "stylesheet" href = "css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <style>
        .overlay {
            background-color: rgba(149, 51, 51);
            z-index: -1;
        }

        .bg {
            background-image:url('images/screws.jpg');
            filter: drop-shadow(8px 8px 10px gray);
            background-size: contain;
            background-repeat: no-repeat;
            height: 100vh;
            opacity: 0.9;
        }

        @media screen and (max-width:1200px) {
            .card,.overlay, .bg {
                width: 100%;
            }
        }

        @media screen and (max-width:600px) {
            .card, .overlay, .bg {
                width: 100%;
            }
        }

        .card{
            padding:2%;
            }
        .card:hover{
            box-shadow: 0 8px 22px rgba(0,0,0,0.3);
        }

        .logo{
            height: 300px;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            position: absolute;
        }

        form.row{
            margin-top:12em !important;
        }

        form.signin{
            margin-top:14em;
        }

        h3 {
            color: #df4759;
            text-align: center;
            font-size: 25px;
            font-weight: 600;
        }

        span {
            color: #DDB30D;
            display: block;
            font-size: 1.2rem;
            font-weight: 400;
        }
        label{
            font-size:15px;
            font-weight: 500;
            margin-left:7px;    
        }  


        input,.form-control{
            font-size:13px;
            font-weight: 200;
        }

        a{
            color: #DDB30D;
            text-decoration: none;
        }

        a:hover{
            color: #df4759;
            text-decoration: underline;
        }

        h5{
            font-size: 1rem;
        }

        

        /* .hero {
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
    } */
    </style>

    <body>
        <section class="vh-100]">
        <!-- <div class="hero vh-100 d-flex align-items-center"> -->
            <div class="container-fluid">
                <!-- <div class="row">
                    <div class="col" style="text-align:center;">
                        <h4 style="text-transform:uppercase">Triple W Motorcycle Parts & Accessories Administrator</h4>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-sm-7 px-0 d-none d-sm-block">
                        <div class="overlay">
                            <div class="bg"></div>
                        </div>
                    </div>

                    <div class="col-5 card">
                        <img class="logo" src="images/logo.png">

                        
                        <?php
                        
                        if (isset($_POST['submit']))
                        {
                            $displayform = False;
                            $displaylogin = True;
                        
                        }
                        
                        if ($displayform)
                        {
                        ?>
                            
                        <form action="sql/account_insert.php" class="row g-3" method="POST">
                            <h3>Admin Registration
                                <span>POS and Inventory System</span>
                            </h3> 
                            <div class="col-md-6 form-floating">
                                <input type="text" name="username" value="Admin" class="form-control" placeholder="text" id="floatingInput" style="height:50px;">
                                <label class="form-label mb-3" for="floatingInput">Username</label>
                            </div>
                            <div class="col-md-6 form-floating">
                                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="text" style="height:50px;" required>
                                <label class="form-label mb-3" for="floatingInput">Name</label>
                            </div>
                            <!-- <div class="col-md-6 form-floating">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="height:50px;" required>    
                                <label class="form-label mb-3" for="floatingInput">Email</label>
                            </div> -->
                            <div class="col-md-6 form-floating">
                                <input type="text" name="contact_number" class="form-control" id="floatingInput" placeholder="number" style="height:50px;" required>
                                <label class="form-label mb-3" for="floatingInput">Contact Number</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="address" class="form-control" id="floatingInput" placeholder="text" style="height:50px;" required>    
                                <label class="form-label mb-3" for="floatingInput">Address</label>                             
                            </div>
                            <div class="col-md-6 form-floating">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" style="height:50px;" required>    
                                <label class="form-label mb-3" for="floatingPassword">Password</label>
                                
                            </div>
                            <div class="col-md-6 form-floating">
                                <input type="password" name="confirmPass" class="form-control" id="password" placeholder="Password" style="height:50px;" required>    
                                <label class="form-label mb-3" for="floatingPassword">Confirm Password</label>
                                
                            </div>

                            <input type="submit" name="submit" value="Register" class="btn btn-danger" style="width:100%;padding:10px;float:right;border-radius:50px;">
                        </form>
                        
                        <?php

                        }
                        ?>
                        <?php
                        if ($displaylogin)
                        {
                        ?>
                        <form action="sql/account_login.php" class="signin" method="POST">
                            <div class="mb-3">
                                <h3>Admin Sign In
                                    <span>POS and Inventory System</span>
                                </h3> 
                                    <div class="form-floating mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="text" id="floatingInput" style="height:50px;" required>
                                        <label class="form-label" for="floatingInput">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" style="height:50px;" required>
                                        <label class="form-label" for="floatingInput">Password</label>
                                    </div>

                                    <input type="submit" name="submit"  value="Login" class="btn btn-danger mt-2" style="width:100%;padding:10px;float:right;border-radius:50px;">
                                    <br>
                                    <br>
                                    <h5 class="mt-3" style="text-align:center">Forgot Password? <a href="forgot_password.php">Click here</a></h5>
                        </form>
                        <?php

                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>  

    </body>
</html>
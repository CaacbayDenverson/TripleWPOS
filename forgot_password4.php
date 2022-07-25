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
#showVc {
  width: 100%;
  text-align: center;
  margin-top: 20px;
  display: none;
}
</style>
<body>

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
                    <h4 style="margin-top:8%;">Verify Your Account</h4>
                    <br>
                    <form action="forgot_password4.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Enter your Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                    
                            <?php
                                $pdo = require 'sql/connection.php';

                                $userInput = '';

                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $userInput = $_POST['email'];

                                    $userSearch = "SELECT * FROM account WHERE email = '".$userInput."' ";
                                    $statement = $pdo->query($userSearch);
                                    $userResult = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    $count = $statement->rowCount();

                                    // if exist
                                    if($count > 0){
                                        $recovery_code = rand(100000,999999);
                                        $_SESSION['recovery_code'] = $recovery_code;
                                        $_SESSION['email'] = $userInput;
                                        require "Mail/phpmailer/PHPMailerAutoload.php";
                                        $mail = new PHPMailer;
                                        
                                        $mail->isSMTP();
                                        $mail->Host='smtp.gmail.com';
                                        $mail->Port=587;
                                        $mail->SMTPAuth=true;
                                        $mail->SMTPSecure='tls';
                                        
                                        $mail->Username='email account';
                                        $mail->Password='email password';
                                        
                                        $mail->setFrom('email account', 'OTP Verification');
                                        $mail->addAddress($_POST["email"]);
                                        
                                        $mail->isHTML(true);
                                        $mail->Subject="Your verify code";
                                        $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $recovery_code <br></h3>
                                        <br><br>
                                        <p>With regrads,</p>
                                        <b>Programming with Lam</b>
                                        https://www.youtube.com/channel/UCKRZp3mkvL1CBYKFIlxjDdg";
                                        
                                        if(!$mail->send()){
                                            ?>
                                                <script>
                                                    alert("<?php echo "Register Failed, Invalid Email "?>");
                                                </script>
                                            <?php
                                        }else{
                                            ?>
                                            <script>
                                                alert("<?php echo "Register Successfully, OTP sent to " . $userInput ?>");
                                                window.location.replace('forgot_password5.php');
                                            </script>
                                            <?php
                                        }

                                        foreach($userResult as $result){
                                            $_SESSION['userID'] = $result['acc_id'];
                                            $_SESSION['secret1'] = $result['secret_1'];
                                            $_SESSION['secret2'] = $result['secret_2'];
                                            $_SESSION['secret3'] = $result['secret_3'];
                                            $_SESSION['recovery_code'] = $result['recovery_code'];
                                        }

                                        echo "<script>
                                        
                                        </script>";
                                    }
                                    else{
                                        // no exist
                                        echo "<script>
                                        alert('Email is incorrect');
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




</body>
</html>
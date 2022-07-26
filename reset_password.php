
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

#partitioned {
  padding-left: 15px;
  letter-spacing: 42px;
  border: 0;
  background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
  background-position: bottom;
  background-size: 50px 1px;
  background-repeat: repeat-x;
  background-position-x: 35px;
  width: 220px;
  outline : none;
}
</style>
<body>
    <div class="hero vh-100 d-flex align-items-center">
        <div class="container card" style="background:white;opacity:0.9;border-radius:20px;">
            <div class="row">
                <div class="col" style="text-align:center;">
                    <img src="images/logo.png" class="logo">
                </div>
            </div>
            <div class="row modcont">
                <div class="col">
                    <h4 style="margin-top:8%;">Reset Password</h4>
                    <br>
                    <center>
                    <p>We've sent an authentication code to be able to reset your password. Check your email inbox.</p>
                    
                    <?php 
                        use PHPMailer\PHPMailer\PHPMailer;
                        require 'vendor/autoload.php';

                        $pdo = require 'sql/connection.php';
                        session_start();
                        $code = rand(1000,9999);
                        $_SESSION['code'] = $code;
                        $sql = 'SELECT email_address FROM account LIMIt 1';
                        $statement = $pdo->prepare($sql);
                        $statement->execute();
                        $email_address = $statement->fetchColumn();
                        
                        $phpmailer = new PHPMailer();
                        $phpmailer->isSMTP();
                        $phpmailer->Host = 'smtp.mailtrap.io';
                        $phpmailer->SMTPAuth = true;
                        $phpmailer->Port = 2525;
                        $phpmailer->Username = '157383d409e401';
                        $phpmailer->Password = 'be8b9c13aa6c16';
                        $phpmailer->isHTML(true);
                        $phpmailer->Subject = 'Triple W Authentication Code';
                        $phpmailer->Body = '
                        <div style="background-color: #f5f5f5; padding: 20px;">
                            <h1 style="font-size: 2.5em; font-weight: bold; color: #333; text-align: center;">Triple W Authentication Code</h1>
                            <p style="font-size: 1.2em; font-weight: bold; color: #333; text-align: center;">Your authentication code is: '.$code.'</p>
                        </div>';
                        $phpmailer->addAddress($email_address);
                        $phpmailer->send();
                    ?>
                    <input id="partitioned" type="text" maxlength="4" />
                    <br>
                    <div class="row justify-content-center" style="margin-top: 20px;">
                            <a href="reset_password.php" class="btn btn-primary" style="margin-top: 15px; width:30%;padding:10px;float:right;margin:10px;">Resend Verification</a>
                            <button onclick="verify()" class="btn btn-danger" style="margin-top: 15px; width:30%;padding:10px;float:right;margin:10px;">Submit</button>
                    </div>
                    <script>
                        function verify(){
                            var code = document.getElementById("partitioned").value;
                            if(code == <?php echo $code; ?>){
                                 window.location.href = "forgot_password3.php";
                            }
                            else{
                                alert("Invalid Code");
                            }
                        }
                    </script>



                   
                    </center>
                    <br>
                    <a href="forgot_password.php" class="btn btn-danger" style="margin-top: 15px; width:100%;padding:10px;float:right;border-radius:50px;margin-top:5px;">BACK</a>
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
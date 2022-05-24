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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                    <form action="forgot_password.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Recovery Code</label>
                                <input type="text" name="recovery_code" maxlength='6' class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter New Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <!-- <button type="button" class="btn btn-danger">Login</button> -->
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirmPass" class="form-control" required>
                            </div>

                            <?php 
                                $pdo = require 'sql/connection.php';
                                require 'sql/code_gen.php';

                                $recovery_code = '';
                                $username = '';
                                $newPass = '';
                                $confirmPass = '';
                                $id = '';

                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $recovery_code = $_POST['recovery_code'];
                                    $username = $_POST['username'];
                                    $newPass = $_POST['password'];
                                    $confirmPass = $_POST['confirmPass'];

                                    if($newPass == $confirmPass){
                                        $sql = "SELECT * FROM account WHERE username ='".$username."'";
                                        $statement = $pdo->query($sql);

                                        $userSearch = $statement->fetchAll(PDO::FETCH_ASSOC);
                                        // $count = $statement->rowCount();

                                        $username_result = '';
                                        $recovery_result = '';

                                        foreach($userSearch as $user){
                                            $username_result = $user['username'];
                                            $recovery_result = $user['recovery_code'];
                                            $id = $user['acc_id'];
                                        }

                                        if($username == $username_result){
                                            if($recovery_code == $recovery_result){
                                                $update = 'UPDATE account SET password=:password, recovery_code=:code WHERE acc_id='.$id;

                                                $statement = $pdo->prepare($update);

                                                $update_password = [
                                                    'password' => 'test',
                                                    'code' => 'trplw1'
                                                ];
                                                $statement->bindParam(':password', $update_password['password']);
                                                $statement->bindParam(':code', $update_password['code']);

                                                //change
                                                $update_password['password'] = password_hash($newPass, PASSWORD_DEFAULT);
                                                $update_password['code'] = generateCode();

                                                //execute query
                                                $statement->execute();

                                                // alert msg
                                                echo "<script>
                                                alert('Account Recovered!');
                                                window.location.href='index.php';
                                                </script>";

                                                exit();
                                            }
                                            else{
                                                echo "<script>alert('Recovery code is incorrect!'); </script>";
                                            }
                                        }
                                        else{
                                            echo "<script>alert('User does not exist!'); </script>";
                                        }
                                    }
                                    else{
                                        // if $newPass != $confirmPass
                                        echo "<script>alert('Password does not match!'); </script>";
                                    }
                                }
                            ?>

                            <input type="submit" value="Reset Password" class="btn btn-danger" style="width:100%;padding:10px;float:right;border-radius:50px;">
                            <a href="index.php" class="btn btn-danger" style="width:100%;padding:10px;float:right;border-radius:50px;margin-top:5px;">BACK</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
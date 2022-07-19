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
                    <h4 style="text-transform:uppercase">Triple W Motorcycle Parts & Accessories Administrator</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <img src="images/logo.png" style="width:500px;margin-left:10%;">
                </div>
                <div class="col-6" style="padding: 50px;">
                    <h4 style="margin-top:15%;">Login</h4>
                    <br>
                    <form action="sql/account_login.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <!-- <button type="button" class="btn btn-danger">Login</button> -->
                            <a href="forgot_password.php" style="margin-left:37%;">Forgot Password?</a>
                            <br>
                            <br>
                            <input type="submit" value="Login" class="btn btn-danger" style="width:100%;padding:10px;float:right;border-radius:50px;">
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
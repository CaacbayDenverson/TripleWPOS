<!DOCTYPE html> 
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triple W Point of Sales</title>
    <link rel = "stylesheet" href = "style.css">
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
    <table style="width:90%;margin:5%;" class="table">
        <thead>
        <tr>
            <th style="font-size:30px;color:white;">Login</th>
             <th style="color:white;"></th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td style="color:white;">Admin</td>
                <td style="color:white;">Staff</td>
            </tr>
            <tr>
                <td>
                    <form class="card">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <button type="button" class="btn btn-danger">Login</button>
                    </form>
                   
                </td>
                <td>
                    <form class="card">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                        </div>
                        <button type="button" class="btn btn-danger">Login</button>
                    </form>
                </td>
            </tr>
        </tbody>
        </table>
    </div>

</body>
</html>
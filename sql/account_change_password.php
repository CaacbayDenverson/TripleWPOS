<?php 
    $pdo = require 'connection.php';
    session_start();
    $user = $_SESSION['user_id'];

    $oldPass = '';
    $newPass = '';
    $confirmPass = '';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $confirmPass = $_POST['confirmPass'];

        //checks if empty
        if(empty($oldPass)){
            echo 'Old Password is Empty';
        }
        if(empty($newPass)){
            echo 'New Password is Empty';
        }
        if(empty($confirmPass)){
            echo 'Confirm Password is Empty';
        }

        
    }

    $sql = 'UPDATE account SET password=:password WHERE acc_id='.$user;

    $statement = $pdo->prepare($sql);

    $update_password = [
        'password' => 'test',
    ];

    $statement->bindParam(':password', $update_user['password']);

    //change
    $update_password['password'] = $_POST['newPass'];

    //execute query
    $statement->execute();

    // alert msg
    echo "<script>
    alert('Password Updated!');
    window.location.href='../profile.php';
    </script>";

    exit();
?>
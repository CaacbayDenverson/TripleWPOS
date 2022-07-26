<?php 
    $pdo = require 'connection.php';
    session_start();
    $user = $_SESSION['user_id'];

    $name = '';
    $address = '';
    $email_address = '';
    $contact_number = '';

    $sql = 'UPDATE account SET name=:name, address=:address, email_address=:email_address,contact_number=:contact_number WHERE acc_id='.$user;

    $statement = $pdo->prepare($sql);

    $update_user = [
        'name' => 'test',
        'address' => 'test',
        'email_address' => 'test',
        'contact_number' => 'test',
    ];

    $statement->bindParam(':name', $update_user['name']);
    $statement->bindParam(':address', $update_user['address']);
    $statement->bindParam(':email_address', $update_user['email_address']);
    $statement->bindParam(':contact_number', $update_user['contact_number']);

    //change
    $update_user['name'] = $_POST['name'];
    $update_user['address'] = $_POST['address'];
    $update_user['email_address'] = $_POST['email_address'];
    $update_user['contact_number'] = $_POST['contact_number'];

    //execute query
    $statement->execute();

    // alert msg
    echo "<script>
    alert('Profile Update Success!');
    window.location.href='../profile.php';
   
    </script>";
    // header("Location: ../profile.php");

    exit();
?>
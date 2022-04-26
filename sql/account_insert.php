<?php 
    $pdo = require 'connection.php';

    $username = '';
    $password = '';

    $sql = 'INSERT INTO account(username, password) VALUES (:username, :password)';

    $statement = $pdo->prepare($sql);

    $new_user = [
        'username' => 'test',
        'password' => 'test',
    ];

    $statement->bindParam(':username', $new_user['username']);
    $statement->bindParam(':password', $new_user['password']);

    //change
    $new_user['username'] = $_POST['username'];
    $new_user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //execute query
    $statement->execute();
    // header("Location: ../accounts.php");
    exit();
?>
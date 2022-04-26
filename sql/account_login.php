<?php
    $pdo = require 'connection.php';
    session_start();

    //login
    $username = '';
    $password = '';
    $newUsername = '';
    $admin_power = '';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //checks if empty
        if(empty($username) || empty($password)){
            echo 'Either input is empty';
        }
        else{
            $sql = "SELECT * FROM account WHERE username = :username";
            $statement = $pdo->prepare($sql);
            
            $statement->execute(array('username' => $username));

            $logins = $statement->fetchAll(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();


            $password_result = '';

            foreach($logins as $login){
                $password_result = $login['password'];
            }

            if($count > 0){
                if(password_verify($password, $password_result)){
                    echo 'Logging In...<br>';
                    header("Location: ../inventory.php");
                }
                else{
                    echo 'Username/assword is incorrect';
                }
            }
            else{
                echo 'Username/Password is incorrect';
            }

        }
    }
?>
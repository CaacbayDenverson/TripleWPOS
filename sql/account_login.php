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
            $sql = "SELECT * FROM account WHERE username = :username AND password = :password";
            $statement = $pdo->prepare($sql);
            
            $statement->execute(
                array(
                    'username' => $username,
                    'password' => $password
                ));

            $logins = $statement->fetchAll(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();
            
            //get data from fetch
            if($logins){
                foreach($logins as $data){
                    $newUsername = $data['username'];
                    $admin_power = $data['admin_power'];
                }
            }

            if($count > 0){
                $_SESSION['username'] = $newUsername;
                $_SESSION['admin_power'] = $admin_power;

                echo 'Logging In...<br>';
                // echo 'userTest: '.$newUsername.'<br>';
                // echo 'admin_power: '.$admin_power.'<br>';
                header("Location: ../inventory.php");
            }
            else{
                echo 'Username/Password is incorrect';
            }

        }
    }

    //testing purposes
    // $_SESSION['emp_id'] = 1;
    // $_SESSION['admin_power'] = 1;
?>
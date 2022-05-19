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
            echo "<script>
            alert('Username/Password is empty.');
            window.location.href='../index.php';
            </script>";
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
                $_SESSION['user_id'] = $login['acc_id'];
            }

            if($count > 0){
                if(password_verify($password, $password_result)){
                    echo 'Logging In...<br>';
                    header("Location: ../inventory.php");
                }
                else{
                    echo "<script>
                    alert('Username/assword is incorrect');
                    window.location.href='../index.php';
                    </script>";
                }
            }
            else{
                echo "<script>
                alert('Username/assword is incorrect');
                window.location.href='../index.php';
                </script>";
            }

        }
    }
?>
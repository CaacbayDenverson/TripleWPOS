<?php 
    $pdo = require 'connection.php';
    require 'code_gen.php';

    $username = '';
    $name = '';
    $address = '';
    $contact_number = '';
    $password = '';
    $confirmPass = '';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];

        $userSearch = "SELECT * FROM account WHERE username = '".$username."' ";
        $statement = $pdo->query($userSearch);
        $userInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
        $count = $statement->rowCount();

        if($password == $confirmPass){
            if($count > 0){
                echo "<script>alert('Username already existed!');
                window.location.href='../profile_new.php';
                </script>";
            }
            else{
                $sql = 'INSERT INTO account(username, name, address, contact_number, password, recovery_code) 
                    VALUES (:username, :name, :address, :contact_number, :password, :recovery_code)';

                $statement = $pdo->prepare($sql);

                $new_user = [
                    'username' => 'test',
                    'name' => 'name',
                    'address' => 'address',
                    'contact_number' => '0',
                    'password' => 'test',
                    'recovery_code' => 'code'
                ];

                $statement->bindParam(':username', $new_user['username']);
                $statement->bindParam(':name', $new_user['name']);
                $statement->bindParam(':address', $new_user['address']);
                $statement->bindParam(':contact_number', $new_user['contact_number']);
                $statement->bindParam(':password', $new_user['password']);
                $statement->bindParam(':recovery_code', $new_user['recovery_code']);
            
                //change
                $new_user['username'] = $_POST['username'];
                $new_user['name'] = $_POST['name'];
                $new_user['address'] = $_POST['address'];
                $new_user['contact_number'] = $_POST['contact_number'];
                $new_user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $new_user['recovery_code'] = generateCode();
            
                //execute query
                $statement->execute();
                echo "<script>
                alert('Account Created!');
                window.location.href='../profile_new.php';
                </script>";
                exit();
            }
        }
        else{
            echo "<script>alert('Password does not match!');
            window.location.href='../profile_new.php';
            </script>";
        }
    }
?>
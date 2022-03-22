<?php 
    session_start();
    $usernameCheck = $_SESSION['username'];

    //redirects user if login session is empty
    if(empty($usernameCheck)){
        header("Location: index.php");
        // echo "session: ".$usernameCheck;
    }
?>
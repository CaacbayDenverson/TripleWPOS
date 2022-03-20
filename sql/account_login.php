<?php
    session_start();

    //login

    //testing purposes
    $_SESSION['emp_id'] = 1;
    $_SESSION['admin_power'] = 1;

    echo 'Logging In...';
    header("Location: ../inventory.php");
?>
<?php 
    session_start();
    session_destroy();

    echo 'Logging Out...';

    header("Location: ../inventory.php");
    exit();
?>
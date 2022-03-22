<?php 
    session_start();
    session_destroy();

    echo 'Logging Out...';

    header("Location: ../index.php");
    exit();
?>
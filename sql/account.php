<?php 
    session_start();

    $emp_id;
    $admin_power;

    //checks if employee id is empty
    if(empty($_SESSION['emp_id'])){
        //if empty, make it empty
        $emp_id = 0;
        $admin_power = 0;
    }
    else{
        //if !empty, use the session
        $emp_id = $_SESSION['emp_id'];
        $admin_power = $_SESSION['admin_power'];;
    }
?>
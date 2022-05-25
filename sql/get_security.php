<?php

$db = mysqli_connect("localhost", "root", "", "triplew");

if(isset($_POST['insertdata']))
{
    // Get text
    $secret_1 = mysqli_real_escape_string($db, $_POST['secret_1']);
    $secret_2 = mysqli_real_escape_string($db, $_POST['secret_2']);
    $secret_3 = mysqli_real_escape_string($db, $_POST['secret_3']);
    $secret_4 = mysqli_real_escape_string($db, $_POST['secret_4']);

    $query = mysqli_query($db,"SELECT * FROM account WHERE recovery_code='$secret_1' ");
      if(mysqli_num_rows($query) > 6)
      {
        echo "success";
      }
      else{
        echo "error";  
      }
}

?>


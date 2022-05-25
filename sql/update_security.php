<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "triplew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$secret_1 = $_POST['secret_1'];
$secret_2 = $_POST['secret_2'];
$secret_3 = $_POST['secret_3'];

$sql = "UPDATE account SET secret_1='$secret_1',secret_2='$secret_2',secret_3='$secret_3' WHERE acc_id=1";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Security Answers has been saved.');
    window.location.href='../profile.php';
    </script>";
} else {
    echo "<script>
    alert('Security Answers Failed.');
    window.location.href='../profile.php';
    </script>";
}

$conn->close();
?>
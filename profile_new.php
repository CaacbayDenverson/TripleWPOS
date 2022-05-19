<?php 
    require 'sql/account_check.php'; 
?>

<!DOCTYPE html>
<hmtl>
    <head>

    </head>

    <body>
        <h1>New User</h1>

        <form action="sql/account_insert.php" method="post">
            <label>Username: </label>
            <input type="text" name="username" required><br><br>

            <label>Name: </label>
            <input type="text" name="name" required><br><br>

            <label>Address: </label>
            <input type="text" name="address" required><br><br>

            <label>Contact: </label>
            <input type="tel" name='contact_number' class='form-control' maxlength='11' required><br><br>

            <label>Password: </label>
            <input type="password" name="password" required><br><br>

            <label>Confirm Password: </label>
            <input type="password" name="confirmPass" required><br><br>

            <input type="submit" value="Create Account">
        </form>
    </body>
</html>
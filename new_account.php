<!DOCTYPE html>
<hmtl>
    <head>

    </head>

    <body>
        <h1>New User</h1>

        <form action="sql/account_insert.php" method="post">
            <label>Username: </label>
            <input type="text" name="username"><br><br>

            <label>Password: </label>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Create Account">
        </form>
    </body>
</html>
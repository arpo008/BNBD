<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin">
        <h1>ADMIN PANNEL</h1>
        <p>Please enter your valid email and password</p>
        <form action="admin db.php" method="post">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name=" " value="Log In">
        </form>
        <p><a href="Home.php">Home</a></p>
    </div>
</body>
</html>
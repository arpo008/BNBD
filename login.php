<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>LOG IN</h1>
        <p class="h5">Please enter your valid email and password</p>
        <form action="login db.php" method="post">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name=" " class="p-1 mt-3 mb-2" value="Log In">
        </form>
        <p>Not have an account? Click <a href="Signup.php">Sign Up Here</a></p>
        <p><a href="Home.php">Home</a></p>
    </div>
</body>
</html>

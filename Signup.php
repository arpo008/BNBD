<?php
$con=mysqli_connect("localhost","root","","bnbd");

if(!$con)
die("Connection Failed: ".mysqli_connect_error());

if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Age = $_POST['age'];
    $Address = $_POST['address'];
    $Number = $_POST['number'];
    $Password = $_POST['pass'];
    
    
    $data = mysqli_query($con, "SELECT cid FROM customer ORDER BY cid DESC LIMIT 1");
    $lcid=0;
    if($row=mysqli_fetch_array($data)){
        $lcid=$row['cid'];
    }
    if($lcid===0)
      $lcid=1100;
    else
    $lcid++;
    

   $sql="INSERT INTO customer (cid,name, email, Age, address, number, pass) VALUES ('$lcid','$Name', '$Email', '$Age', '$Address', '$Number', '$Password')" ;
    if (mysqli_query($con, $sql)) {
        
        header("location: Signup.php");

        echo"<script>alert('Successful')</script>";
         
    }else{
        echo "Something went wrong";
    }
    mysqli_close($con);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<form method="POST">
    <div class="Signup">
        <h1>SIGN UP</h1>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="age">Age</label>
        <input type="text" id="age" name="age" required>
        
        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>
        
        <label for="number">Number</label>
        <input type="tel" id="number" name="number" required>
        
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" required>
        
        <input type="submit" name="submit" class="p-1 mt-3 mb-2" value="SUBMIT">
    
</form>
    <p>Already have an account? <a href="login.php">Login Here</a></p>
      <p><a href="home.php">Home</a></p>
      </div>
</body>
</html>

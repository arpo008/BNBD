<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'bnbd';

$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Age = $_POST['age'];
    $Address = $_POST['address'];
    $Number = $_POST['number'];
    $Password = $_POST['pass'];
    
    
    $Name = mysqli_real_escape_string($conn, $Name);
    $Email = mysqli_real_escape_string($conn, $Email);
    $Age = mysqli_real_escape_string($conn, $Age);
    $Address = mysqli_real_escape_string($conn, $Address);
    $Number = mysqli_real_escape_string($conn, $Number);
    $Password = mysqli_real_escape_string($conn, $Password);
    
    $sql_query = "INSERT INTO signup (Name, email, Age, address, number, pass) VALUES ('$Name', '$Email', '$Age', '$Address', '$Number', '$Password')" ;
   
    if (mysqli_query($conn, $sql_query)) {
        echo "SUCCESSFULLY REGISTERED";
    } else {
        echo "Something Went Wrong! Please enter valid values and try again. ERROR: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

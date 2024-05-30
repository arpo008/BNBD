<?php

$Email= $_POST['email'];
$Password= $_POST['password'];

$con = new mysqli('localhost', 'root', '','bnbd' );

if($con-> connect_error)

{
    die("Failed to connect: ".$con->connect_error);
}
else{ 
    $stmt = $con-> prepare("select * from signup  where email=?");
    $stmt->bind_param("s",$Email);
    $stmt ->execute();
    $stmt_result= $stmt-> get_result();

    if($stmt_result-> num_rows>0)
    {
          $data= $stmt_result ->fetch_assoc();
          if($data ['pass'] === $Password)
          {
            header("Location: dashboard.php");
          }
          else{
            echo '<script>alert("Invalid Email or Password")</script>';
          }
    }
    else
    {
        echo "<h2> Invalid Email or pass </h2>";
    }
}

?>





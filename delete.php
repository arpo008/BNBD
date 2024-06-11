<?php
 $con = mysqli_connect('localhost', 'root', '', 'bnbd');

  $ID= $_GET['id'];
   
 mysqli_query($con , "DELETE FROM product WHERE pid= '$ID'");
 header('location:product.php');

?>

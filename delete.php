<?php
 $con = mysqli_connect('localhost', 'root', '', 'bnbd');
 echo $ID= $_GET['id'];
 mysqli_query($con , "DELETE FROM product WHERE id= $ID");
 header('location:product.php');

?>

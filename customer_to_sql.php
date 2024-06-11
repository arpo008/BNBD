<?php
 session_start();
 if(isset($_SESSION['productlist'])){
     $ar=$_SESSION['productlist'];
 }
 else{
   echo " No Data Entry";
   exit;
 }   

 $total=0;
 $ar = json_decode($ar[0],true);
 foreach($ar as $value){
  echo $value['pid']."<br>";
  echo $value['quantity']."<br>"; 
  echo $value['totalprice']."<br>";
  $total+=$value['totalprice'];
 }

 $cid=$_SESSION['cid'];
 echo "Customer ID is " . $cid;
 date_default_timezone_set("Asia/Dhaka");
 $t1=date("hidm");
 $time=date("d/m/Y");

$date = DateTime::createFromFormat("d/m/Y", $time);
$date->modify('+7 days');
$newdate = $date->format("d/m/Y");
 
 $oid=$t1.$cid;
 echo "<br>".$oid."<br>".$t1;

 $con = mysqli_connect('localhost', 'root', '', 'bnbd');
 



     $sql = "INSERT INTO orders VALUES ('$cid','$oid','$time','$newdate','$total')";

     foreach($ar as $value){ 
      $pid=$value['pid'];
      $quantity=$value['quantity'];
      $sql2="INSERT INTO order_detail VALUES ('$oid','$pid','$quantity')";
      if (mysqli_query($con, $sql2)) {
        //header('location: product.php');
        echo "<br>Data added in order_detail <br>";
     } else {
         echo "Error inserting data: " . mysqli_error($con);
     }
     }   
    
     if (mysqli_query($con, $sql)) {
        //header('location: product.php');
        echo "<br>Data added in orders <br>";
     } else {
         echo "Error inserting data: " . mysqli_error($con);
     }
     //order processing, Shipping , Delivered
     $order_status="Order Processing";
     $sql3="INSERT INTO order_history VALUES ('$oid','$order_status')";
     if (mysqli_query($con, $sql3)) {
        //header('location: product.php');
        echo "<br>Data added in orders_history <br>";
     } else {
         echo "Error inserting data: " . mysqli_error($con);
     }
?>
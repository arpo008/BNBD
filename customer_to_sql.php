<?php
 session_start();
 if(isset($_SESSION['productlist'])){
     $ar=$_SESSION['productlist'];
 }
 else{
   echo " No Data Entry";
   exit;
 }   
 $ar = json_decode($ar[0],true);
 foreach($ar as $value){
  echo $value['pid']."<br>";
  echo $value['quantity']."<br>"; 
  echo $value['totalprice']."<br>";
 }
 $cid=$_SESSION['cid'];
 echo "Customer ID is " . $cid;
?>
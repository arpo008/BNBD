<?php
date_default_timezone_set("Asia/Dhaka");
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("h:i:sa") . "<br>";    
$t1=date("hi");
$t2=date("dm");
echo $t1."<br>";
echo $t2."<br>";
$t3=$t1.$t2;
echo $t3."<br>";

session_start();
$productlist=[];
if(isset($_POST)){
    $data=file_get_contents("php://input");

    $user=json_decode($data, true);
    
    if(is_array($user)){
        foreach($user as $value){
              array_push($productlist,$value);   
            }
        } 
        $_SESSION['productlist']=$productlist;     
    }

else
echo"no";

echo "Array from session: " . implode(", ", $productlist);

?>
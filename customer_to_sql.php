<?php
session_start();
if(isset($_SESSION['productlist'])){
    $ar=$_SESSION['productlist'];
} else {
    echo "No Data Entry";
    exit;
}

$ar = json_decode($ar[0], true);
$cid = $_SESSION['cid'];
session_unset();  
session_destroy(); 

$total = 0;
foreach($ar as $value) {
    $total += $value['totalprice'];
}

date_default_timezone_set("Asia/Dhaka");
$time = date("d/m/Y");

$date = DateTime::createFromFormat("d/m/Y", $time);
$date->modify('+7 days');
$newdate = $date->format("d/m/Y");

$con = mysqli_connect('localhost', 'root', '', 'bnbd');

$info = mysqli_query($con, "SELECT oid FROM orders ORDER BY oid DESC LIMIT 1");
$ooid=0;
if($row=mysqli_fetch_array($info)){
    $ooid=$row['oid'];
}
if($ooid===0)
  $ooid=3200;
else
$ooid++;

$tt=$ooid;
 


$sql = "INSERT INTO orders ( cid, oid , order_date, delivery_date, total_price) VALUES ('$cid', '$tt', '$time', '$newdate', '$total')";
echo"<br>".$ooid."<br>";
mysqli_query($con, $sql);
//echo"<br>".$oid."<br>";


foreach($ar as $value) { 
    $pid = $value['pid'];
    $quantity = $value['quantity'];
    $sql2 = "INSERT INTO order_detail VALUES ('$tt', '$pid', '$quantity')";
    mysqli_query($con, $sql2);
}    


$order_status = "Order Processing";
$sql3 = "INSERT INTO order_history VALUES ('$tt', '$order_status')";
mysqli_query($con, $sql3);

mysqli_close($con);
session_start();
$_SESSION['cid']=$cid;


echo "
<script>
    if(localStorage.getItem('item') != null) {
        localStorage.removeItem('item');
    }

    if(localStorage.getItem('items') != null) {
        localStorage.removeItem('items');
    }
    alert('Thank You For Shopping');
    window.location.href = 'dashboard.php';
</script>
";
//order processing , shipped , delivered
?>

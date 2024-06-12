<?php
 $con = mysqli_connect('localhost', 'root', '', 'bnbd');

 if (isset($_POST['update'])) {
    $oid = $_POST['oid'];  // Retrieve oid from the POST request
    $order_status = $_POST['name'];  // Retrieve order_status from the POST request

    // Update the order status for the given oid
    mysqli_query($con, "UPDATE order_history SET `order_status`='$order_status' WHERE oid='$oid'");
    header('location: orderstrack.php');
 }
?>

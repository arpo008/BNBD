<?php
$con = mysqli_connect("localhost", "root", "", "bnbd");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    $product_id = mysqli_real_escape_string($con, $product_id);

    $sql = "DELETE FROM order_status WHERE Product_id = '$product_id'";
    if(mysqli_query($con,$sql)){
        header('location:order status.php');
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="card card-body mt-4">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Order Date</th>
                        <th>Expected Delivery Date</th>
                        <th>Order Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con=mysqli_connect("localhost","root","","bnbd");
                    $data=mysqli_query($con,"SELECT * FROM order_status");
                    while($row=mysqli_fetch_array($data)){
                        echo "
                        <tr>
                        <td>{$row['Product_id']}</td>
                        <td>{$row['product_Name']}</td>
                        <td>{$row['Order_Date']}</td>
                        <td>{$row['Expected_Delivery_Date']}</td>
                        <td>{$row['Order_Status']}</td>
                        <td>

                        <form method='post'>
                        <input type='hidden' name='product_id' value='{$row['Product_id']}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Cancel</button>
                       </form>

                        </td>
                        </tr>";
                    }
                    ?>
                </tbody>
</body>
</html>